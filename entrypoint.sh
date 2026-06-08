#!/bin/bash

# Copy config - don't fail if it doesn't exist
if [ -f /var/www/html/wp-config-railway.php ]; then
    cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php
fi

# Update port
PORT=${PORT:-80}
sed -i "s|Listen .*|Listen ${PORT}|g" /etc/apache2/ports.conf

# Fix modules
a2dismod mpm_event mpm_worker >/dev/null 2>&1 || true
a2enmod mpm_prefork >/dev/null 2>&1 || true

# Start Apache
exec apache2-foreground
