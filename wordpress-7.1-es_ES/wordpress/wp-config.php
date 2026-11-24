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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'q/ozIXpK0iTT^9k.|d_7d|$p`f6X:4|/~!+W@3Oz@zt4Z=>4IP=.-NQ/s`V) +Zb' );
define( 'SECURE_AUTH_KEY',  'pLvxzR>,znCPRPc~O)_n6qwq1my}6![H)x+4la4c5-)=@2Pw$2X9Ff4_b.@-sdgI' );
define( 'LOGGED_IN_KEY',    '[:mI$S.BwMsadb.v41*S8>nW]5|k0X^NHg+^vrDSEhF9`QU.uSeiF~$`+Ai_oO`=' );
define( 'NONCE_KEY',        'eAT7.v1@VJh_C8ohvuSF?9{Z:teDFlJ3+H.|K4uR*][86i?{m3V7pF3uQI!({!Ko' );
define( 'AUTH_SALT',        '!]R[Q;zM)q;<+xG%2/yO*|of7+KYS:;J^O.d$=,-dAR 7VbWiJ]j4ClP_1^.dI:W' );
define( 'SECURE_AUTH_SALT', 'e:G(NyP^?5i$vA[=:gru24h&}D9ZVJq22?O27n([`g^KdVT}0C+c[q<5AFl$WeQf' );
define( 'LOGGED_IN_SALT',   '{lg7$8>&3A8/q@2)ITD#?$e76Y(MY~.Rfk8K[+*B;wU=T#7Cr7~D+{,$.FW@BK^P' );
define( 'NONCE_SALT',       '3X!-/[`Z/]$!Zk+~jDx!`>1 P9zU@dxMPs]|ncqC[&]:/4j_tOO.*5T?tW@:TTpf' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
