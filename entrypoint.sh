#!/bin/bash

echo "🚀 Starting LPC WordPress initialization..."
echo "📋 Environment:"
echo "  MYSQL_HOST: ${MYSQL_HOST:-not set}"
echo "  MYSQL_DATABASE: ${MYSQL_DATABASE:-not set}"
echo "  PORT: ${PORT:-80}"
echo "  RAILWAY_PUBLIC_DOMAIN: ${RAILWAY_PUBLIC_DOMAIN:-not set}"

# Copy wp-config
echo "📋 Setting up wp-config.php..."
cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php
chown -R www-data:www-data /var/www/html

# Wait for MySQL with long timeout
echo "⏳ Waiting for MySQL..."
MYSQL_READY=0
for i in {1..120}; do
  if wp db check --allow-root &>/dev/null; then
    echo "✅ MySQL connected!"
    MYSQL_READY=1
    break
  fi
  echo "  Attempt $i/120..."
  sleep 1
done

if [ $MYSQL_READY -eq 0 ]; then
  echo "⚠️ MySQL not responding - starting Apache anyway, WordPress will show installer"
else
  # Install WordPress if not already installed
  echo "🔍 Checking WordPress installation..."
  if ! wp core is-installed --allow-root 2>/dev/null; then
    echo "📦 Installing WordPress..."
    wp core install \
      --url="https://${RAILWAY_PUBLIC_DOMAIN:-localhost}" \
      --title="${WP_SITE_TITLE:-London Pentecostal Church}" \
      --admin_user="${WP_ADMIN_USER:-lpcadmin}" \
      --admin_password="${WP_ADMIN_PASSWORD:-Ch@ngeMe2026!}" \
      --admin_email="${WP_ADMIN_EMAIL:-admin@londonpentecostalchurch.org}" \
      --skip-email \
      --allow-root
    if [ $? -eq 0 ]; then
      echo "✅ WordPress installed!"
    else
      echo "⚠️ WordPress installation had issues, continuing anyway..."
    fi
  else
    echo "✅ WordPress already installed"
  fi
fi

# Fix Apache config
echo "⚙️ Configuring Apache..."
a2dismod mpm_event mpm_worker 2>/dev/null || true
rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* 2>/dev/null || true
a2enmod mpm_prefork 2>/dev/null
sed -i "s/Listen 80/Listen ${PORT:-80}/" /etc/apache2/ports.conf
apache2ctl -t 2>&1 | head -5

# Activate theme if WordPress is installed
if wp core is-installed --allow-root 2>/dev/null; then
  echo "🎨 Activating theme..."
  wp theme activate lpc-theme --allow-root 2>/dev/null || true
fi

echo "✅ Container initialization complete - starting Apache"
echo "🌐 Access site at: https://${RAILWAY_PUBLIC_DOMAIN:-localhost}"

# Start Apache
exec apache2-foreground
