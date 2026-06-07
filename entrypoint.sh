#!/bin/bash
set -e

echo "=== LPC WordPress — Railway Entrypoint ==="

# ── Populate /var/www/html with WordPress core files ─────────────────
# The official WordPress image stores core files in /usr/src/wordpress/.
# Its docker-entrypoint.sh copies them on first boot, but since we
# override the entrypoint we must do it ourselves.
if [ ! -f /var/www/html/wp-includes/version.php ]; then
    echo "⏳ Copying WordPress core files..."
    cp -a /usr/src/wordpress/. /var/www/html/
    chown -R www-data:www-data /var/www/html
    echo "✓ WordPress core files installed"
fi

# ── Copy our wp-config into place ────────────────────────────────────
if [ -f /var/www/html/wp-config-railway.php ]; then
    cp /var/www/html/wp-config-railway.php /var/www/html/wp-config.php
    echo "✓ wp-config.php configured from Railway env vars"
fi

# ── Wait for MySQL to be ready ────────────────────────────────────────
DB_HOST="${MYSQL_HOST:-localhost}"
DB_PORT="${MYSQL_PORT:-3306}"
DB_NAME="${MYSQL_DATABASE:-wordpress}"
DB_USER="${MYSQL_USER:-wordpress}"
DB_PASS="${MYSQL_PASSWORD:-}"

echo "⏳ Waiting for MySQL at $DB_HOST:$DB_PORT..."
MAX_TRIES=30
COUNT=0
until mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASS" --silent 2>/dev/null; do
    COUNT=$((COUNT + 1))
    if [ $COUNT -ge $MAX_TRIES ]; then
        echo "❌ MySQL not reachable after $MAX_TRIES attempts. Continuing anyway..."
        break
    fi
    echo "   attempt $COUNT/$MAX_TRIES..."
    sleep 2
done
echo "✓ MySQL connection established"

# ── WordPress install via WP-CLI ──────────────────────────────────────
WP_URL="https://${RAILWAY_PUBLIC_DOMAIN:-localhost}"
WP_TITLE="${WP_SITE_TITLE:-London Pentecostal Church}"
WP_ADMIN_USER="${WP_ADMIN_USER:-lpcadmin}"
WP_ADMIN_PASS="${WP_ADMIN_PASSWORD:-ChangeMeNow2024!}"
WP_ADMIN_EMAIL="${WP_ADMIN_EMAIL:-admin@londonpentecostalchurch.org}"

cd /var/www/html

# Check if already installed
if ! wp core is-installed --allow-root 2>/dev/null; then
    echo "🔧 Installing WordPress..."
    wp core install \
        --url="$WP_URL" \
        --title="$WP_TITLE" \
        --admin_user="$WP_ADMIN_USER" \
        --admin_password="$WP_ADMIN_PASS" \
        --admin_email="$WP_ADMIN_EMAIL" \
        --skip-email \
        --allow-root
    echo "✓ WordPress installed"

    # ── Activate LPC theme ────────────────────────────────────────────
    wp theme activate lpc-theme --allow-root
    echo "✓ LPC theme activated"

    # ── Set permalinks ────────────────────────────────────────────────
    wp rewrite structure '/%postname%/' --allow-root
    wp rewrite flush --allow-root
    echo "✓ Permalinks set"

    # ── Delete default content ────────────────────────────────────────
    wp post delete 1 --force --allow-root 2>/dev/null || true  # Hello World
    wp post delete 2 --force --allow-root 2>/dev/null || true  # Sample page
    echo "✓ Default content removed"

    # ── Create core pages ─────────────────────────────────────────────
    wp post create \
        --post_type=page \
        --post_title='Home' \
        --post_status=publish \
        --post_name=home \
        --allow-root
    HOME_ID=$(wp post list --post_type=page --post_name=home --field=ID --allow-root)

    wp post create \
        --post_type=page \
        --post_title='About' \
        --post_status=publish \
        --post_name=about \
        --page_template=page-about.php \
        --allow-root

    wp post create \
        --post_type=page \
        --post_title='Ministries' \
        --post_status=publish \
        --post_name=ministries \
        --allow-root

    wp post create \
        --post_type=page \
        --post_title='Sermons' \
        --post_status=publish \
        --post_name=sermons \
        --allow-root

    wp post create \
        --post_type=page \
        --post_title='Branches' \
        --post_status=publish \
        --post_name=branches \
        --allow-root

    wp post create \
        --post_type=page \
        --post_title='Contact' \
        --post_status=publish \
        --post_name=contact \
        --page_template=page-contact.php \
        --allow-root

    # Set front page
    wp option update show_on_front 'page' --allow-root
    wp option update page_on_front "$HOME_ID" --allow-root
    echo "✓ Pages created"

    # ── Create primary navigation menu ───────────────────────────────
    wp menu create "Primary Menu" --allow-root
    MENU_ID=$(wp menu list --fields=term_id --format=csv --allow-root | tail -1)

    for PAGE_NAME in about ministries sermons branches contact; do
        PAGE_ID=$(wp post list --post_type=page --name="$PAGE_NAME" --field=ID --format=csv --allow-root 2>/dev/null | head -1)
        if [ -n "$PAGE_ID" ]; then
            wp menu item add-post "$MENU_ID" "$PAGE_ID" --allow-root 2>/dev/null || true
        fi
    done

    wp menu location assign $MENU_ID primary --allow-root
    echo "✓ Navigation menu created"

    # ── Add sample branches ───────────────────────────────────────────
    declare -A BRANCHES=(
        ["Chadwell Heath"]="branch-lpc|Oasis Centre, Essex Road, Romford RM6|Sun 10AM · 12:30PM · 3PM|English · Malayalam · Hindi|#cc0000"
        ["Basildon"]="branch-bpc|Basildon Pentecostal Church, SS14|Sunday 11:00 AM|English|#8b0a28"
        ["Chelmsford"]="branch-cpc|Chelmsford Pentecostal Church, CM1|Sunday 11:00 AM|English|#1a4fd6"
        ["Harlow"]="branch-hpc|Harlow Pentecostal Church, CM20|Sunday 10:30 AM|English|#8b7800"
        ["South London"]="branch-slpc|SLPC, South East London|Sunday 11:00 AM|English · Malayalam|#7b008b"
    )

    for BRANCH_NAME in "Chadwell Heath" "Basildon" "Chelmsford" "Harlow" "South London"; do
        IFS='|' read -r CSS ADDR TIME LANG COLOR <<< "${BRANCHES[$BRANCH_NAME]}"
        BRANCH_ID=$(wp post create \
            --post_type=branch \
            --post_title="$BRANCH_NAME" \
            --post_status=publish \
            --porcelain \
            --allow-root)
        wp post meta update $BRANCH_ID _lpc_address "$ADDR" --allow-root
        wp post meta update $BRANCH_ID _lpc_sunday_time "$TIME" --allow-root
        wp post meta update $BRANCH_ID _lpc_languages "$LANG" --allow-root
        wp post meta update $BRANCH_ID _lpc_css_class "$CSS" --allow-root
        wp post meta update $BRANCH_ID _lpc_brand_colour "$COLOR" --allow-root
    done
    echo "✓ Branch data populated"

    # ── Sample announcement post ──────────────────────────────────────
    wp post create \
        --post_type=post \
        --post_title='Silver Jubilee — 25 Years of God'\''s Faithfulness' \
        --post_status=publish \
        --post_content='Join us this summer as we celebrate 25 years of London Pentecostal Church with a special weekend of worship, testimonies, and community.' \
        --allow-root
    echo "✓ Sample announcement created"

    # ── Theme Customizer defaults ─────────────────────────────────────
    wp option update theme_mods_lpc-theme '{
        "lpc_hero_eyebrow":"Welcome · London Pentecostal Church",
        "lpc_hero_title":"A Place of *Peace,* Hope & Belonging.",
        "lpc_hero_subtitle":"Come as you are. You are welcomed, loved, and expected.",
        "lpc_hero_btn1":"Plan Your Visit",
        "lpc_hero_btn1_url":"/contact",
        "lpc_hero_btn2":"Watch a Sermon",
        "lpc_hero_btn2_url":"/sermons",
        "lpc_time_english":"Sunday · 10:00 AM",
        "lpc_time_malayalam":"Sunday · 12:30 PM",
        "lpc_time_hindi":"Sunday · 3:00 PM",
        "lpc_time_bible":"Wednesday · 7:00 PM",
        "lpc_address":"Oasis Centre, Essex Road, Chadwell Heath, Romford RM6",
        "lpc_email":"info@londonpentecostalchurch.org",
        "lpc_youtube":"https://www.youtube.com/@LondonPentecostalChurch"
    }' --format=json --allow-root
    echo "✓ Theme options set"

    echo ""
    echo "============================================"
    echo "  ✅ LPC WordPress is ready!"
    echo "  🌐 Site: $WP_URL"
    echo "  👤 Admin: $WP_ADMIN_USER"
    echo "  🔑 Password: $WP_ADMIN_PASS"
    echo "  📋 Admin panel: $WP_URL/wp-admin"
    echo "============================================"
    echo ""
else
    echo "✓ WordPress already installed — skipping setup"

    # Always ensure theme is active
    wp theme activate lpc-theme --allow-root 2>/dev/null || true

    # Update site URL if domain changed
    if [ ! -z "$RAILWAY_PUBLIC_DOMAIN" ]; then
        wp option update siteurl "https://$RAILWAY_PUBLIC_DOMAIN" --allow-root 2>/dev/null || true
        wp option update home    "https://$RAILWAY_PUBLIC_DOMAIN" --allow-root 2>/dev/null || true
    fi
fi

# ── Fix file permissions ──────────────────────────────────────────────
chown -R www-data:www-data /var/www/html/wp-content
chmod -R 755 /var/www/html/wp-content

echo "🚀 Starting Apache..."
exec "$@"
