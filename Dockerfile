FROM wordpress:6.7-php8.2-apache

RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*

# Enable mod_rewrite for WordPress permalinks
RUN a2enmod rewrite

COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/
COPY wp-config-railway.php /var/www/html/wp-config-railway.php
COPY .htaccess /var/www/html/.htaccess

RUN chown -R www-data:www-data /var/www/html/wp-content /var/www/html/.htaccess

EXPOSE 80

# Copy entrypoint script
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
