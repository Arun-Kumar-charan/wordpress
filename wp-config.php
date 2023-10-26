<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Halmoni' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'Web@2050' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'H^g~{ln?c4n~h+Zn3iyVU0bS:Vj<x8xb^dD2qaD %FAy8N}{B/b6r^BQR5(k]dO!' );
define( 'SECURE_AUTH_KEY',  '2.3t}o?SA~qgroX*]I%$?|Ln5IF%!pmyq3 !7SP^Q7l-qS&,1v}mK}|g6<.og`*Z' );
define( 'LOGGED_IN_KEY',    '#[ _5j7oLX$).oWC1g]]ev_Ej}mjKd#}xT4+r$$BG Fxw^k-S}{,u(>*mmzSrRxo' );
define( 'NONCE_KEY',        'oAB1{P*{d?kfa2*E:vc%)*,_dHc9# H|niic4hBp<$?dWC}_QXCqR$Hj<X/SpMP;' );
define( 'AUTH_SALT',        'RmwHMQ545|5X]}wYpY_+@d.;6a}C)6rTG!%?XM^?{*Z97-08`EV#p5Jik9<tHi|}' );
define( 'SECURE_AUTH_SALT', '|$hg}V+kDUB<; 9WSMjy3p1_YqZ+0t^z${&X(RuxT5HmM~/9@S*F!gE.%|@|Cw09' );
define( 'LOGGED_IN_SALT',   'jVm90=^n{k!>O0!g!]<HwgWP4]_ps/k{*c7+c3kcApmQTKvoj]gqVq~9bFXz%9j%' );
define( 'NONCE_SALT',       '@Wzzd^N#_OMJ&weH:>b8}jHh)8ZdeNF/<z#u*zOnY!v}*^,AQ0[U-K?y%M2/>x8v' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
