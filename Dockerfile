FROM wordpress:6.7-php8.2-apache

RUN echo '<?php echo "OK"; ?>' > /var/www/html/test.php

RUN a2dismod mpm_event mpm_worker 2>/dev/null || true
RUN a2enmod mpm_prefork 2>/dev/null || true

COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/ 2>/dev/null || true
COPY wp-config-railway.php /var/www/html/ 2>/dev/null || true
COPY entrypoint.sh / 2>/dev/null || true
RUN chmod +x /entrypoint.sh 2>/dev/null || true

RUN chown -R www-data:www-data /var/www/html

CMD ["/entrypoint.sh"]
