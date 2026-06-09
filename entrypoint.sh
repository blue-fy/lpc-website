#!/bin/bash
set -e

[ -f /var/www/html/wp-config-railway.php ] && cp /var/www/html/wp-config-railway.php /var/www/html/wp-config.php 2>/dev/null

rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.*

exec apache2-foreground
