FROM wordpress:6.7-php8.2-apache

# Create test file
RUN echo '<?php echo "OK - Container is running"; ?>' > /var/www/html/test.php

# Fix MPM modules
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true && \
    a2enmod mpm_prefork 2>/dev/null || true

# Copy our custom files
COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/ 2>/dev/null || true
COPY wp-config-railway.php /var/www/html/ 2>/dev/null || true
COPY entrypoint.sh / 2>/dev/null || true

RUN chmod +x /entrypoint.sh 2>/dev/null || true && \
    chown -R www-data:www-data /var/www/html

ENTRYPOINT ["/entrypoint.sh"]
