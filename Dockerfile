FROM php:8.2-apache

RUN apt-get update && apt-get install -y mariadb-client-compat curl wget && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql

# CRITICAL: Fix MPM module conflict - disable ALL conflicting MPMs first
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load /etc/apache2/mods-enabled/mpm_*.conf
RUN a2enmod mpm_prefork rewrite headers

# Ensure Apache listens on all interfaces
RUN sed -i 's/^Listen 80$/Listen 0.0.0.0:80/' /etc/apache2/ports.conf

# Download WordPress
WORKDIR /var/www/html
RUN curl -O https://wordpress.org/latest.tar.gz && \
    tar xzf latest.tar.gz && \
    mv wordpress/* . && \
    rmdir wordpress && \
    rm latest.tar.gz

# Copy our customizations
COPY lpc-theme/ wp-content/themes/lpc-theme/
COPY wp-config-railway.php .
COPY .htaccess .

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
