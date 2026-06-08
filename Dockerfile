FROM wordpress:6.7-php8.2-apache

# Update and install tools
RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*

# Enable Apache modules needed for WordPress
RUN a2enmod rewrite headers 2>/dev/null || true && \
    a2dismod mpm_event mpm_worker 2>/dev/null || true && \
    a2enmod mpm_prefork 2>/dev/null || true

# Copy theme and config
COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/
COPY wp-config-railway.php /var/www/html/wp-config-railway.php
COPY .htaccess /var/www/html/.htaccess

# Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

# Use simple init script
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
