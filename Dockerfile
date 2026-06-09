FROM php:8.2-apache

RUN apt-get update && apt-get install -y mariadb-client-compat curl wget && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql

# CRITICAL: Fix MPM module conflict - nuclear option
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load /etc/apache2/mods-enabled/mpm_*.conf && \
    rm -f /etc/apache2/mods-available/mpm_*.load /etc/apache2/mods-available/mpm_*.conf && \
    # Remove all LoadModule lines for mpm_ from main config
    sed -i '/LoadModule mpm_/d' /etc/apache2/apache2.conf || true && \
    # Ensure only mpm_prefork is available and enabled
    echo "LoadModule mpm_prefork_module modules/mod_mpm_prefork.so" > /etc/apache2/mods-available/mpm_prefork.load && \
    a2enmod mpm_prefork rewrite headers

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
