FROM php:8.2-apache

RUN apt-get update && apt-get install -y mysql-client curl && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite headers

COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/ 2>/dev/null || true
COPY wp-config-railway.php /var/www/html/ 2>/dev/null || true
COPY .htaccess /var/www/html/ 2>/dev/null || true

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
