#!/bin/bash
set -e

echo "🚀 Starting LPC WordPress initialization..."

# Copy wp-config
echo "📋 Setting up wp-config.php..."
cp -f /var/www/html/wp-config-railway.php /var/www/html/wp-config.php
chown -R www-data:www-data /var/www/html

# Wait for MySQL
echo "⏳ Waiting for MySQL to be ready..."
for i in {1..30}; do
  if nc -z "${MYSQL_HOST:-localhost}" "${MYSQL_PORT:-3306}" 2>/dev/null; then
    echo "✅ MySQL is ready!"
    break
  fi
  echo "  Attempt $i/30 - retrying in 2 seconds..."
  sleep 2
done

# Install WordPress if not already installed
if ! wp core is-installed --allow-root 2>/dev/null; then
  echo "📦 Installing WordPress..."
  wp core install \
    --url="${RAILWAY_PUBLIC_DOMAIN:-localhost}" \
    --title="${WP_SITE_TITLE:-London Pentecostal Church}" \
    --admin_user="${WP_ADMIN_USER:-lpcadmin}" \
    --admin_password="${WP_ADMIN_PASSWORD:-Ch@ngeMe2026}" \
    --admin_email="${WP_ADMIN_EMAIL:-admin@example.com}" \
    --skip-email \
    --allow-root
  echo "✅ WordPress installed!"
else
  echo "✅ WordPress already installed"
fi

# Create Layout Samples page if it doesn't exist
if ! wp post list --post_type=page --title="Layout Samples" --allow-root --field=ID 2>/dev/null | grep -q .; then
  echo "📐 Creating Layout Samples page..."
  wp post create \
    --post_type=page \
    --post_title="Layout Samples" \
    --post_name="layout-samples" \
    --post_status=publish \
    --post_content="This page showcases different church website layout options." \
    --allow-root > /dev/null
  echo "✅ Layout Samples page created!"
fi

# Fix Apache config
echo "⚙️  Configuring Apache..."
a2dismod mpm_event mpm_worker || true
rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* || true
a2enmod mpm_prefork
sed -i "s/Listen 80/Listen ${PORT:-80}/" /etc/apache2/ports.conf
apache2ctl -t

# Activate theme
echo "🎨 Activating theme..."
wp theme activate lpc-theme --allow-root || true

echo "✅ LPC WordPress is ready!"
echo "🌐 Site: https://${RAILWAY_PUBLIC_DOMAIN:-localhost}"
echo "👤 Admin: ${WP_ADMIN_USER:-lpcadmin}"

# Start Apache
exec apache2-foreground
