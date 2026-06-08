#!/bin/bash

# Copy config if exists
[ -f /var/www/html/wp-config-railway.php ] && cp /var/www/html/wp-config-railway.php /var/www/html/wp-config.php

# Configure port
PORT=${PORT:-80}
if [ "$PORT" != "80" ]; then
  sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
  sed -i "s/Listen 0.0.0.0:80/Listen 0.0.0.0:${PORT}/" /etc/apache2/ports.conf
fi

# Start Apache
exec apache2-foreground
