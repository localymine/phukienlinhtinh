<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db_phukienlinhtinh');

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
define('AUTH_KEY',         'J6~w812leqi96P%2|?#zrtI#*l1~wPJ?IV8%!pB7Yy|oU3ktL/M4pq%bF#IbSH0#');
define('SECURE_AUTH_KEY',  '(RRl2!xHlqnw~AK5MyoSN@8JAJ(_6BzADhmCN^O6onOd3+h@RKE*0y%uzf&FO"B0');
define('LOGGED_IN_KEY',    '6Z+E"kH(00GHA@C6bNE&)mAYKA|r&?/mB13SJ6AJ;KGD^d?KDcnVWG1OSgA1ITNN');
define('NONCE_KEY',        'QlJt2R7/kMb|^pJ~?HX(N9Bn"Rl3BAxjRGp!7"SK/@2lquLTBB6a!iUUoCwQu9r|');
define('AUTH_SALT',        'O#V7gel3KD~V*6fg~PqHJ`D/WJYy7IvAB#BB~:z_#TTEBuHQ6%H13$l1wxH"V"T;');
define('SECURE_AUTH_SALT', '7j`hjfl9zS*NmRp3`#H%+Qq$$*T#xqoo7G/2/l+?DL%StC3)L0Ic:|91;ZFd|d~c');
define('LOGGED_IN_SALT',   '5S~j?|xTYch28O(jZ(J~z:^IL`Zd;evNe_FO+`":$+/ipnhr8w!fbox9T`dHGiFN');
define('NONCE_SALT',       'b!vY;TTlyO7ZpFaBP_G1ubW!PtO#$#Ssa04gI68kfc$tT~slGv12UU%8fbJsZ^NJ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_bwbptj_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* Multisite */
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'phukienlinhtinh.localhost');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

