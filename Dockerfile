FROM php:8.2-apache

RUN apt-get update && apt-get install -y mysql-client curl wget && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite headers mpm_prefork

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
