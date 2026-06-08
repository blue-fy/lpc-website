FROM wordpress:6.7-php8.2-apache

# Ensure Apache listens on all interfaces, not just localhost
RUN sed -i 's/^Listen 80/Listen 0.0.0.0:80/' /etc/apache2/ports.conf || \
    sed -i 's/Listen 80/Listen 0.0.0.0:80/' /etc/apache2/ports.conf || true

# Fix MPM modules
RUN a2dismod mpm_event mpm_worker >/dev/null 2>&1 || true && \
    a2enmod mpm_prefork >/dev/null 2>&1 || true

# Ensure WordPress core files exist
RUN test -f /var/www/html/index.php || (cd /var/www/html && wp core download --allow-root 2>/dev/null || true)

COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/ 2>/dev/null || true
COPY wp-config-railway.php /var/www/html/ 2>/dev/null || true
COPY entrypoint.sh / 2>/dev/null || true
RUN chmod +x /entrypoint.sh 2>/dev/null || true

RUN chown -R www-data:www-data /var/www/html

ENTRYPOINT ["/entrypoint.sh"]
