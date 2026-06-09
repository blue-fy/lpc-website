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

$db_host = getenv('MYSQL_HOST') ?: getenv('DB_HOST') ?: 'localhost';
$db_port = getenv('MYSQL_PORT') ?: getenv('DB_PORT');
if ( $db_port && strpos( $db_host, ':' ) === false ) {
    $db_host .= ':' . $db_port;
}
define( 'DB_HOST', $db_host );
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

// ── Security keys (generated via https://api.wordpress.org/secret-key/1.1/salt/) ──
// Can be overridden by Railway env vars if needed
define( 'AUTH_KEY',         getenv('AUTH_KEY')         ?: 'yscf04:oh8yDj:2u,(Q)%bN(Z6oULn$cwndc>,1Td!<|eM% !fDpi,|pMWF|J/SU' );
define( 'SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY')  ?: ';i]QeaQW12Ot4,H! AuBU&s7.7{j_;!|nbcCzf#;@|*|^QtvJLIKD^ 4h3F<:cX{' );
define( 'LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY')    ?: '}PAAY4}DEeD*naykUcQ*3}} 5PNeRD](O1@6?R3m(4[LJm%gcJAk+kO&u1[gH7JF' );
define( 'NONCE_KEY',        getenv('NONCE_KEY')        ?: 'Vg#{_RUE14M)awo[x>%oMDJgR[8yA!xAS35$7NF`]7QO6GgR!I}U3*Qp7hS28qz+' );
define( 'AUTH_SALT',        getenv('AUTH_SALT')        ?: 'iS2P5,q.xv8r9nq4)or-(R;t(Qpj#PNg>Y&fx$)1`d?wQ?=US-@IxwCJP>U&[C8o' );
define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') ?: '{|djr=zw[VKmhc)1zMy2%8]N|<#j-.F([pPk-7<SJ5l0BI%DjD+:2{{?P231MO<!' );
define( 'LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT')   ?: 'ITLf)bb48o6oI(|<pkNkU68OK-)}|(C74FMysT!62F-*;j45JuVee$P&.fn2s>l6' );
define( 'NONCE_SALT',       getenv('NONCE_SALT')       ?: ']46Z4-1NG~,{dF/:O,bCK2a6#6!-zsj6p-qZ__*!k#n+v}`-x<CUUY5#BMXx| BO' );

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
// Always tell WordPress we're on HTTPS. Railway terminates SSL at the
// edge, so the container only receives plain HTTP — but WordPress must
// believe it's HTTPS to avoid redirect loops and mixed-content warnings.
$_SERVER['HTTPS'] = 'on';

// ── Absolute path ─────────────────────────────────────────────────────
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
