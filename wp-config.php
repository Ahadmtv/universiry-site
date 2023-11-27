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
define( 'DB_NAME', 'guilan' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '9mPLl)={@<;J=6d`EBKK1X+z?uj#}7Km1~IR@7AwPgEds&(SB(n5Jths3NZ.)<u(' );
define( 'SECURE_AUTH_KEY',  'n--}5YC,Z>wN hoER#gTS2K!h:zT9gw.t%HQcRxe+_4NxdH!6v4xL^na)wF8VMmN' );
define( 'LOGGED_IN_KEY',    'qQ8|l)N0dhsk`xd_~]5J#F|teV(uF72qk?6}.jL=jm?6mFxpi,=3HbRc|KsD?A8z' );
define( 'NONCE_KEY',        'L>V 2a~%H+!6!K@Aqu$I4lyQ5YwzIHK<o^.%]I(K:+[S3P>/&KN]gwPHdebV `pM' );
define( 'AUTH_SALT',        '={@D@K3&[VlU,ppKro?GpkRT$T{k^i9Pc?lJMYMHYZhac5$*!d=4]<,IUc%7T}AN' );
define( 'SECURE_AUTH_SALT', 'N<~FMp,#T@YE=e$!N RoVDjVnl$. WUVu*pOsz.ojZG]xh#_;z,=noR-e:3;R}%~' );
define( 'LOGGED_IN_SALT',   's<qYaiTh#Zm]2%mi<@2dwq/9AkT!=>xBq&fk*F]3R8j)QY[$-DP{hV.x-}%my)JU' );
define( 'NONCE_SALT',       '%R|u-beFq6S~:Ct`[GKp!y#]=1Ol}s d/V?pl=LFAGSq^^7KS# 6<BniiA.,s*bN' );

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
