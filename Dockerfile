FROM wordpress:6.7-php8.2-apache

RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*

COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/
COPY wp-config-railway.php /var/www/html/wp-config-railway.php

RUN chown -R www-data:www-data /var/www/html/wp-content

EXPOSE 80

# Copy wp-config on startup and fix MPM modules
CMD ["/bin/bash", "-c", "cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php && chown -R www-data:www-data /var/www/html && a2dismod mpm_event mpm_worker || true && rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* || true && a2enmod mpm_prefork && sed -i \"s/Listen 80/Listen ${PORT:-80}/\" /etc/apache2/ports.conf && apache2ctl -t && exec apache2-foreground"]
