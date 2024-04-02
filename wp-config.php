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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'OF()b`7,Z7%~qVMY%*W):*uuY]J7AcJ^jaf@l&$<YrgYF;YG28*J_c3EMR[9]+Ui' );
define( 'SECURE_AUTH_KEY',   ':o$I&Fr$:xc22*#>kFK~=tl_&3IY=E_Qe75_&R0jOM9b$.U)tVZLw.09<+*+5}L#' );
define( 'LOGGED_IN_KEY',     'ur5ajJ6O.{o@#~az&F-Zn,XcT~1URV%(Ujy}u]1qpb41/xv<8Dosr58H8J3!PDK2' );
define( 'NONCE_KEY',         'Lrq^:c.lJ]43*@YCh6N5gg9%hTfH%wlnD *y/sLI@G];a9J<QY<q2?= ;oiW1c,>' );
define( 'AUTH_SALT',         '|[ /Ze9fky! pX-=JGmOzDw+P=ES8ypR9&:~!1N]+]R#T]iCei%7}k$Q|=gNt2$3' );
define( 'SECURE_AUTH_SALT',  'd:XXt9Y^ih54KsLH0rp:|{eb-1lATr~[D{QEcDpU6~z%O/{$t+|y|MM3>4R&Rzfq' );
define( 'LOGGED_IN_SALT',    '2ZgG5TRU*n@A&c)y#peOF[mX&8Xn+~(9HMzyJ[f.ATYJ#/jG7o8&;l(}djx&Sxx;' );
define( 'NONCE_SALT',        '.];l?s=|l[s3v?73bIW-`=HSf]jX#OpTk&:/cWq-=7OM3Zgo1^n_MyYmyvDFW<b0' );
define( 'WP_CACHE_KEY_SALT', 'wvGV`ln4y}Ux;Wypp)._N|hvwi4co8:?c`29>x8cO3*v@L~l3$|5<L,3PglNowx9' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
