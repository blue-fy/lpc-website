FROM wordpress:6.7-php8.2-apache

RUN apt-get update && apt-get install -y curl && rm -rf /var/lib/apt/lists/*

COPY lpc-theme/ /var/www/html/wp-content/themes/lpc-theme/
COPY wp-config-railway.php /var/www/html/wp-config-railway.php

RUN chown -R www-data:www-data /var/www/html/wp-content

EXPOSE 80

# Copy entrypoint script
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Install netcat for MySQL connection check
RUN apt-get update && apt-get install -y netcat-openbsd && rm -rf /var/lib/apt/lists/*

ENTRYPOINT ["/entrypoint.sh"]
