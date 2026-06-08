#!/bin/bash
set -e

# Copy railway-specific config
cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php

# Update Apache port for Railway
PORT=${PORT:-80}
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf

# Fix MPM
a2dismod mpm_event mpm_worker 2>/dev/null || true
a2enmod mpm_prefork 2>/dev/null || true

# Run Apache
exec apache2-foreground
