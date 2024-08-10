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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'codensk1_jovial_vision' );

/** Database username */
define( 'DB_USER', 'codensk1_jovial_vision' );

/** Database password */
define( 'DB_PASSWORD', 'sX9fDl}2Vmoi' );

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
define( 'AUTH_KEY',         'l&a:P][8$FQ. JExT2lcF>B5ODG9CG+;2041Y?yi?5+gY>nSL=KiXu.Nv_f@kT)U' );
define( 'SECURE_AUTH_KEY',  '~2L8;`m.+Hg0RC;b0[rm}GA2>*n(xJ_AdXwU?5Iy3#RuM nMzg}?`iA9?{{G^+a5' );
define( 'LOGGED_IN_KEY',    'CbF#{wy(837J OUwtp0{:0d[8Lu&c091V?nogqIy^^Om[+^J3_tnJWs|`U$ XGU,' );
define( 'NONCE_KEY',        'p=>rqvZCo8-x.}=z^:i}6+]J }YJS}RbrmUCT5R&?_E~aF9n+}q#Dt(1pKl[SX0]' );
define( 'AUTH_SALT',        '3v!*X;_,gmR*-I&1G9YOSy(}u]O&]Qc(j/#_AZF|>jXC#kT50leVH^&68 P3n`&~' );
define( 'SECURE_AUTH_SALT', '#(aZ$`OaS1*qa3&.^kZaSGXH9tOy0&oifB,Vwv[4}8 XsbCLohf;6UivEA[#QFD;' );
define( 'LOGGED_IN_SALT',   '&<*K7@*X0&0X0(d%f*Vy/57XbL5Jo_HQO]#bfoYW7Hno`*m.YS:P_|l);ii]!20!' );
define( 'NONCE_SALT',       'uj~[|B6:h,] @|_Xm@e=3o@vo;b7~kARbubs)rtfcgZ}hKW`M>EA.qBeiWajs1f7' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'jv_';

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
