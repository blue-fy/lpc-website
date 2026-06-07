#!/bin/bash

# Disable conflicting MPM modules
a2dismod mpm_prefork mpm_worker mpm_event 2>/dev/null || true

# Enable only mpm_prefork
a2enmod mpm_prefork 2>/dev/null || true

# Copy wp-config
if [ -f /var/www/html/wp-config-railway.php ]; then
    cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php
fi

# Fix permissions
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html/wp-content

# Start Apache
exec apache2-foreground
