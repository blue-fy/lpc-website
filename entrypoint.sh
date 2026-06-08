#!/bin/bash

# Copy wp-config
cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php
chown -R www-data:www-data /var/www/html

# Fix MPM modules
a2dismod mpm_event mpm_worker >/dev/null 2>&1 || true
a2enmod mpm_prefork rewrite headers >/dev/null 2>&1 || true

# Set port
sed -i "s/Listen 80/Listen ${PORT:-80}/" /etc/apache2/ports.conf

# Start Apache
exec apache2-foreground
