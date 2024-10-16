<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bitnami_wordpress' );

/** Database username */
define( 'DB_USER', 'bn_wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'a14274ba9ed76953708fcf7480b701d24709d7b3cbdd5d449439a9e299fb2114' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'W@<.ky~oR/vR7_u^M.y:v=)WJ$>N:Y0[2C).;EX|+GlN}OcSL3B8}#t9oJNWiWLF' );
define( 'SECURE_AUTH_KEY',  'Q/yMld]*kqVC5..Ft{;3+~U%[E[~).#|t%j@Sw@:f}6Ebp~-.;h[Z]PO/#(QnN@O' );
define( 'LOGGED_IN_KEY',    'J,]EqGvfelWJUkD*Ve{|R#>zC8/#Xr,!P]hQ>!Kt6:kYk`jp5q0XA!&RUP3PDSK?' );
define( 'NONCE_KEY',        '~.E_3Sj4=J8Q/$/>7,f@fY%P^+%4@~?p6hO3RN!z89jd>a{-;HhW6E-M3;(~]zld' );
define( 'AUTH_SALT',        'C,60!w)7#HpP9pn#5iy0H&<_o<>SD{b@4uYMQ{VlaG+/M,nOn35]S%B8aKkf af[' );
define( 'SECURE_AUTH_SALT', 'J%}jy}2eL&MBI0b)Q,!3#Z*uA]5}KPQ3=PQ[auyPBkr&6R+tH?fCQi)=Vt`n]UZ(' );
define( 'LOGGED_IN_SALT',   'NQj~J_-E3yio3^L`lDB@}&jXe^X9.I8GLF3?iUI32>}sUpF3Zq-~$]a0j1twB#jW' );
define( 'NONCE_SALT',       '~*@rU*QrlIg~|1emn(tCF`]*QM%J:IgWleQ4?1Xr17`#f[IF$0TY/,[DqAk2Sq U' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
