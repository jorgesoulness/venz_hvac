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
// define( 'DB_NAME', 'hvacdb' );
<<<<<<< HEAD
// define( 'DB_NAME', 'hvacdbprod' );
define( 'DB_NAME', 'hvacbkp' );
=======
define( 'DB_NAME', 'hschdbvi_hvacdb' );
>>>>>>> 946386ef6a45593d1ea4a01e9d814c7fb5ad7688

/** Database username */
define( 'DB_USER', 'hschdbvi_admindbs' );

/** Database password */
define( 'DB_PASSWORD', 't0%Rh{*IhPj5iUDU' );

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
define( 'AUTH_KEY',         'qo;`!)0VTB%sUz(HG52O[bTL3P[lV:?jx4wt|,QkWt7dSFU8rwrt 3H{5Ga0y^s?' );
define( 'SECURE_AUTH_KEY',  '}`[fT76B3HC<zkO1M `p#wD3ps*ETAd)0Mt@!~Qla@n69xy`KOg,!B26gK0HHk2;' );
define( 'LOGGED_IN_KEY',    'Y$US_MrqK7?vN]+4BAQX;e%|eg:`H{}y!/KDrdx1dYsCfUA&XS$<ez$_ykxo}Obu' );
define( 'NONCE_KEY',        'J;|]5A(uaRgbea1Mxq0&bK};sdd_Rzy~R,%SW?sF}:@n+StW7A8)&P{Nm9E.eoGb' );
define( 'AUTH_SALT',        'rYxFEje$F5&&@zp;QWIc>dc78HnqB y}4L|Oymbd8^-4lV$-h%F6.v)#+@A.]nTC' );
define( 'SECURE_AUTH_SALT', 'yNgXyIMmR]W8Xw0s4;nHX{z?J*]BBVZXmex6iZ3C5rD4X}H7qeUAo{Yr !75e5%-' );
define( 'LOGGED_IN_SALT',   '6UDXW`q,y/< >ZLr3oEbkIE9BL#zf[I;MZls~h_ncevZ.`^2v,j7@c@1:ot_2X]@' );
define( 'NONCE_SALT',       'B.HY&&Q+R(v.owQC]+m36$/tfKmf)8E41bCYLl?LPadBO:RXcNhHU~9geD(I$HED' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
// $table_prefix = 'hvdb_';
$table_prefix = 'wpnb_';

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
