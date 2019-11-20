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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/dh_aidmdj/andrewspastries.us/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'andrewspastries_us');

/** MySQL database username */
define('DB_USER', 'andrewspastriesu');

/** MySQL database password */
define('DB_PASSWORD', 'zsp?hjr8');

/** MySQL hostname */
define('DB_HOST', 'mysql.andrewspastries.us');

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
define('AUTH_KEY',         'Q3os5wJFjg`US+cgejm88HQ1ce|LofF#xNh@a@(+SG;_dW@*X68s^w!&CKQ3e%/0');
define('SECURE_AUTH_KEY',  'R`1ZwUlSl|IpG"jV@fxRn&Q;Y?RoaC#&XWKvk%|_V*BqTzt_UQRFdqQQov~CD|`W');
define('LOGGED_IN_KEY',    '2JZ)XbJ_qACQ~xZRe(d+Cp#X^R|TlzUP(VIpZW(VcGYP?``_8`I;mlEUCy^`TjCg');
define('NONCE_KEY',        'F2xOMt:DX*Fpx$s#~(#wZOMfK@Q)hPcZG~?kF_"*^OE0huyVPw6RN)_il1B$42MR');
define('AUTH_SALT',        'At$Rs@NaYL"y9Z*am|?Ip~io!L_f|`Bkf4bZ2yzS5_B$BTwU+PbHS5P_8&K6Hn+F');
define('SECURE_AUTH_SALT', '(yYhR3s*4vcAto)MORM8pWg$@0az(tQG51_!@?Wm!zH4IY0(aaBEo8S6V/7kyV)f');
define('LOGGED_IN_SALT',   'W~Q:"Qrawxo(V3qNndJ6Pdg1VV%$u25rX$|6Bl@n~%`o?bA`(2cAY)|)V$5IW|^c');
define('NONCE_SALT',       'jE+zmX4lG/"U/wG22J2y8yWT0OEgn3Dxx"4;6u1/8bg$Y4@@SAfN*xecnU4IrByb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_esiuqd_';

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

/**
 * Removing this could cause issues with your experience in the DreamHost panel
 */

if (preg_match("/^(.*)\.dream\.website$/", $_SERVER['HTTP_HOST'])) {
        $proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        define('WP_SITEURL', $proto . '://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    $proto . '://' . $_SERVER['HTTP_HOST']);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

