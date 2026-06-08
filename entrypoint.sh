#!/bin/bash
cp /var/www/html/wp-config-railway.php /var/www/html/wp-config.php 2>/dev/null || true
exec apache2-foreground
