#!/bin/bash
set -x

# Disable ALL conflicting MPM modules
a2dismod mpm_prefork 2>/dev/null || true
a2dismod mpm_worker 2>/dev/null || true
a2dismod mpm_event 2>/dev/null || true

# Wait a moment
sleep 1

# Enable ONLY mpm_prefork
a2enmod mpm_prefork 2>/dev/null || true

# Copy wp-config
if [ -f /var/www/html/wp-config-railway.php ]; then
    cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php
fi

# Fix permissions
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html/wp-content

# Restart Apache to apply module changes
apache2ctl graceful 2>/dev/null || true

# Wait for Apache to be ready
sleep 2

# Start Apache in foreground
exec apache2-foreground
