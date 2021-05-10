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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'redhatmedia' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'y!psM{q+ 5V2o}Pn|*v;m*G #O[wWrZzG*.Ii/9zJ,)qJWu,F#M`su>X/#V)g_(C' );
define( 'SECURE_AUTH_KEY',  'lDruUEse t$^;]S5(w9p}2y_W*tr*LNK-MVIs)+vBFK|62q%(7r!g9rXKolPP2c[' );
define( 'LOGGED_IN_KEY',    'WfAUy(I=H[o0#v@er[9`)!OedK<LD1>+=On|yN1z,;a(JEmH8@vwpYNM(j@KYsp]' );
define( 'NONCE_KEY',        '%L95+$lw1YR`V_1WtALU+3gZzB+8Qx8Z; C-4/wS)K5S5ZgCt{D!l8i:hux#.AS6' );
define( 'AUTH_SALT',        'Bt;-9iOI}9Jb#X?:AxsP`T,@kP#cBGzeSM:bf9+RV%SbN2(JFnA>^Cx*K{0@h8<$' );
define( 'SECURE_AUTH_SALT', '[h@OAbPyB#U+_CuwXjo%=xI!Fj$?wmgB|0(G$vQ#8v=U>i(ZU-L^#jwESl_h/2 o' );
define( 'LOGGED_IN_SALT',   '6Dkg>@`&S26:>^k5A77`]3_]7Zw;h6&4_)]KK`v$N:C3E/6*5<=s>OKS##I5`#!s' );
define( 'NONCE_SALT',       '-~1NxA^N&^KrRZ}G1L[kw|G8^tTEl! Df Ir/b1PAX#t.p|c~am$-_)R|drSXh$W' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'rhm_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
