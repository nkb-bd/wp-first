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

define( 'WP_DEBUG_DISPLAY', false );
ini_set( 'display_errors', 0 );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sadaka');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '=V&85.K8jaW>@M19RSax?5B_}.OUZ:pQAddhS,{~ck4>OSVJKPH()Y:g-yfyhl8a');
define('SECURE_AUTH_KEY',  'IdxwS^}Y3&i^CPwj]J7Fcs%:!_LtG$7vxTAVFmq7Fl@onVG@.U$UUc?yV[|!qWAz');
define('LOGGED_IN_KEY',    'wC6Y3lMeZuY1:oV,{DiB/1f^DDJ9;(X>1xPp! 5/mC6axaE;=y?b+@mxSDM,3?7N');
define('NONCE_KEY',        '}^!3+/zHr -d<>q}(siNV_t/BMrYB{Ml*q6_4p_=::dnY0tWa~^1`|KJ)B$~i&xk');
define('AUTH_SALT',        '4?pF)1w_3yQMA0=nH$^]wP1*AtQh6!jH7>8-?hTt?7,H)4mDt~q?n/9 /sX,]aso');
define('SECURE_AUTH_SALT', 'OrJL3_wwPE3~pK*WYKl77Bdk(4nM}:}BtB(Y={Ic% a3WiRR31D]n1[3F{}Cp</w');
define('LOGGED_IN_SALT',   '4jKL+u2&,:[.2FJqol0kZbnaT?&+,ap-e bq!?}xSxQk]$| Y4cQX1wSI9*p49vf');
define('NONCE_SALT',       '$8rDJW 4(R^95cn!8eYAr.+w,81tYxll+Bm0IWA}U7{Z<H8Y^vvt,x%iT/*Dib.G');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sadaka_';

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
