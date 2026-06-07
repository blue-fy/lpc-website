<?php
/**
 * WordPress config for Railway deployment
 * Reads all credentials from Railway environment variables
 * Never hardcode credentials — Railway injects them at runtime
 */

// ── Database (Railway MySQL plugin auto-sets these) ──────────────────
define( 'DB_NAME',     getenv('MYSQL_DATABASE') ?: getenv('DB_NAME')     ?: 'wordpress' );
define( 'DB_USER',     getenv('MYSQL_USER')     ?: getenv('DB_USER')     ?: 'wordpress' );
define( 'DB_PASSWORD', getenv('MYSQL_PASSWORD') ?: getenv('DB_PASSWORD') ?: '' );
define( 'DB_HOST',     getenv('MYSQL_HOST')     ?: getenv('DB_HOST')     ?: 'localhost' );
define( 'DB_CHARSET',  'utf8mb4' );
define( 'DB_COLLATE',  '' );

// ── Site URL (Railway provides RAILWAY_PUBLIC_DOMAIN) ────────────────
$railway_domain = getenv('RAILWAY_PUBLIC_DOMAIN');
$wp_home        = getenv('WP_HOME');

if ( $wp_home ) {
    define( 'WP_HOME',    $wp_home );
    define( 'WP_SITEURL', $wp_home );
} elseif ( $railway_domain ) {
    define( 'WP_HOME',    'https://' . $railway_domain );
    define( 'WP_SITEURL', 'https://' . $railway_domain );
}

// ── Security keys (generate fresh at https://api.wordpress.org/secret-key/1.1/salt/) ──
// Railway: set these as env vars AUTH_KEY, SECURE_AUTH_KEY, etc.
// Fallbacks used here for initial deploy only — REPLACE before going live
define( 'AUTH_KEY',         getenv('AUTH_KEY')         ?: 'lpc-auth-key-replace-me-2024'           );
define( 'SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY')  ?: 'lpc-secure-auth-replace-me-2024'        );
define( 'LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY')    ?: 'lpc-logged-in-key-replace-me-2024'      );
define( 'NONCE_KEY',        getenv('NONCE_KEY')        ?: 'lpc-nonce-key-replace-me-2024'          );
define( 'AUTH_SALT',        getenv('AUTH_SALT')        ?: 'lpc-auth-salt-replace-me-2024'          );
define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') ?: 'lpc-secure-auth-salt-replace-me-2024'   );
define( 'LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT')   ?: 'lpc-logged-in-salt-replace-me-2024'     );
define( 'NONCE_SALT',       getenv('NONCE_SALT')       ?: 'lpc-nonce-salt-replace-me-2024'         );

// ── Table prefix ─────────────────────────────────────────────────────
$table_prefix = 'lpc_';

// ── Environment flags ────────────────────────────────────────────────
define( 'WP_DEBUG',         getenv('WP_DEBUG')  === 'true' );
define( 'WP_DEBUG_LOG',     false );
define( 'WP_DEBUG_DISPLAY', false );

// ── Performance ──────────────────────────────────────────────────────
define( 'WP_CACHE',       false ); // enable after adding caching plugin
define( 'COMPRESS_CSS',   true  );
define( 'COMPRESS_SCRIPTS', true );

// ── File system — needed on Railway (no SSH) ─────────────────────────
define( 'FS_METHOD', 'direct' );

// ── HTTPS — Railway handles SSL termination at proxy ─────────────────
if ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
    $_SERVER['HTTPS'] = 'on';
}

// ── Absolute path ─────────────────────────────────────────────────────
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
