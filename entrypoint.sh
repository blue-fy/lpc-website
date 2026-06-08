#!/bin/bash

echo "🚀 Starting LPC WordPress initialization..."
echo "📋 Environment:"
echo "  MYSQL_HOST: ${MYSQL_HOST}"
echo "  MYSQL_USER: ${MYSQL_USER}"
echo "  MYSQL_DATABASE: ${MYSQL_DATABASE}"
echo "  PORT: ${PORT:-80}"
echo "  RAILWAY_PUBLIC_DOMAIN: ${RAILWAY_PUBLIC_DOMAIN}"

# Copy wp-config
echo "📋 Setting up wp-config.php..."
cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php || exit 1
chown -R www-data:www-data /var/www/html

# Wait for MySQL
echo "⏳ Waiting for MySQL to be ready..."
for i in {1..60}; do
  if wp db check --allow-root &>/dev/null; then
    echo "✅ MySQL is connected!"
    break
  fi
  echo "  Attempt $i/60 - retrying in 2 seconds..."
  sleep 2
  if [ $i -eq 60 ]; then
    echo "❌ MySQL connection timeout!"
    exit 1
  fi
done

# Install WordPress if not already installed
echo "🔍 Checking WordPress installation..."
if ! wp core is-installed --allow-root 2>/dev/null; then
  echo "📦 Installing WordPress..."
  wp core install \
    --url="${RAILWAY_PUBLIC_DOMAIN:-localhost}" \
    --title="${WP_SITE_TITLE:-London Pentecostal Church}" \
    --admin_user="${WP_ADMIN_USER:-lpcadmin}" \
    --admin_password="${WP_ADMIN_PASSWORD:-Ch@ngeMe2026}" \
    --admin_email="${WP_ADMIN_EMAIL:-admin@example.com}" \
    --skip-email \
    --allow-root || exit 1
  echo "✅ WordPress installed!"
else
  echo "✅ WordPress already installed"
fi

# Fix Apache config
echo "⚙️ Configuring Apache..."
a2dismod mpm_event mpm_worker || true
rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* || true
a2enmod mpm_prefork || exit 1
sed -i "s/Listen 80/Listen ${PORT:-80}/" /etc/apache2/ports.conf || exit 1
apache2ctl -t || exit 1

# Activate theme
echo "🎨 Activating theme..."
wp theme activate lpc-theme --allow-root 2>/dev/null || true

echo "✅ LPC WordPress is ready!"
echo "🌐 Site: https://${RAILWAY_PUBLIC_DOMAIN:-localhost}"
echo "👤 Admin: ${WP_ADMIN_USER:-lpcadmin}"

# Start Apache
exec apache2-foreground
