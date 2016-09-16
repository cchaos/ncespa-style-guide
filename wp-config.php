<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ncespa_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'oI~NJ~b[cUK^{DQef<DKXX(|<LuE{D#Zds!]Vp6*Sf2*f^>$x<~Vax#?lB+uT8]/');
define('SECURE_AUTH_KEY',  'TFshJcGr -nK@DY}yz-v5scX2U`?jZzaOz>?/GD3(oQu]a;Az0>CBR5eR-3vOWpq');
define('LOGGED_IN_KEY',    'L!F~}5 [$5u7)>b0zofL=2#$AF)Y^EChrTp,Ko3_{#nWi}vr8i8S)*H~2p&w?dk.');
define('NONCE_KEY',        'mAI/^(,]~h-Q0=Qr/12qds$?7r9|^BT)O:24TZ?{_:,G<9,L#vC&0{lt4^F)XSJ}');
define('AUTH_SALT',        '5E(m,$|F}60YE]W2/KFZ9P^&h98eWG-UYqMj:1WY=a^A/G80>J>-qX>?XAeRQ[`d');
define('SECURE_AUTH_SALT', 'Y3q>[9UvOsKa+gQ>;Fyps,O55UR{yC7YZx3 O{#BW!]?8lkqc/zJ!n!AUEVG2P.{');
define('LOGGED_IN_SALT',   '%%wHofTD$ZszU^]A-Da}=,K^3lK`>`yowQwP=++}&.Z]YOVV4&* zOCQw$^}`y6B');
define('NONCE_SALT',       '{RGh4yl+k9`U6:J;Br*pe7!akJXBxt/4u~}YlI(z,p<KExIMw5NXK?Q+P:P-2h1H');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
