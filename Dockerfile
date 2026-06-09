FROM wordpress:6.7-php8.2-apache

RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*

# Fix Apache MPM
RUN a2dismod mpm_event mpm_worker || true
RUN a2enmod mpm_prefork rewrite headers

# Copy theme and config
COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/
COPY wp-config-railway.php /var/www/html/
COPY .htaccess /var/www/html/
COPY entrypoint.sh /

RUN chmod +x /entrypoint.sh
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]
