#!/bin/bash

set -e

echo "🚀 Starting LPC WordPress..."

# Setup wp-config
cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php
chown -R www-data:www-data /var/www/html

# Fix Apache config (must be before starting Apache)
echo "⚙️ Fixing Apache MPM modules..."
a2dismod mpm_event mpm_worker 2>/dev/null || true
rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* 2>/dev/null || true
a2enmod mpm_prefork rewrite headers 2>/dev/null || true

# Set proper port
sed -i "s/Listen 80/Listen ${PORT:-80}/" /etc/apache2/ports.conf

# Test Apache config
apache2ctl -t 2>&1 | tail -1

echo "✅ Apache configured"
echo "🌐 Starting on port ${PORT:-80}"

# Start Apache in foreground
exec apache2-foreground
