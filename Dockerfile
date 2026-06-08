FROM wordpress:6.7-php8.2-apache

RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*

# Disable conflicting MPM
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true && \
    a2enmod mpm_prefork 2>/dev/null || true

# Copy our files
COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/
COPY wp-config-railway.php /var/www/html/
COPY .htaccess /var/www/html/

# Create symlink for wp-config
RUN ln -sf /var/www/html/wp-config-railway.php /var/www/html/wp-config.php || true

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
