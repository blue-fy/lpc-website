#!/bin/bash
[ -f /var/www/html/wp-config-railway.php ] && cp /var/www/html/wp-config-railway.php /var/www/html/wp-config.php 2>/dev/null
exec apache2-foreground
