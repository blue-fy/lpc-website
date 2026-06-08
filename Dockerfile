FROM wordpress:6.7-php8.2-apache

RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*

RUN a2dismod mpm_event mpm_worker >/dev/null 2>&1 || true && \
    a2enmod mpm_prefork >/dev/null 2>&1 || true && \
    a2enmod rewrite headers >/dev/null 2>&1 || true

COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/ 2>/dev/null || true
COPY wp-config-railway.php /var/www/html/wp-config-railway.php 2>/dev/null || true
COPY .htaccess /var/www/html/ 2>/dev/null || true
COPY entrypoint.sh / 2>/dev/null || true

RUN chmod +x /entrypoint.sh 2>/dev/null || true && \
    chown -R www-data:www-data /var/www/html

CMD ["/entrypoint.sh"]
