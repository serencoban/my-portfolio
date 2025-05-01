<?php
/**
 * The base configuration for WordPress
 *
 * The my-portfolio-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "my-portfolio-config.php"
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
define( 'DB_NAME', 'portfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'q-SyHN#Vk>ea=#6Dnu8_2%^6wj/>FH5v;/_g@<1RZq/cdAx7MD.q,A0Kzq8g}FeT' );
define( 'SECURE_AUTH_KEY',  '5k!C!,%_TWr^ w*?s$LH:?6vWK4alEI-+TcVJm^H2nGy*cp#= Y+^Up:dLDv?Rg/' );
define( 'LOGGED_IN_KEY',    'CtY)2leS<($t=dQYh:e,*0`P>qkh+Yxo.iZQ HAH#a]r7;5>JW5: DPl]s@;&<,N' );
define( 'NONCE_KEY',        ')bJN$GF#x1/tf HDiye{Y;ck]8(q58RJZI($fP~}9]imsF38*3H$qA0r#!qq:s-1' );
define( 'AUTH_SALT',        'U2>`Sh4Qelx sZp]8.2o,43 }QYgn)o(^heHnx}~?G%(Ftv8x)&F7h*Vlvk=rfC+' );
define( 'SECURE_AUTH_SALT', 'A{]]r;d(UV-&N.A/P]l]9s[%$F{*}<S1x_%|1T90CK/8Q,|>sW#Ly9-,E7az2n?I' );
define( 'LOGGED_IN_SALT',   ')(*aL_>ky`*!LS6QD_zl/*ytbf`KI`dtCEC%p!w=@oR^<>PVhm:<h_bCBf7{CbKk' );
define( 'NONCE_SALT',       'gGAjFW!#wTQ7:IXSy+G$B#vuHT[bWqBj6T*mk|Q*yFe<lh*No!VeM{rF8<7v*t4.' );

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
require_once ABSPATH . 'my-portfolio-settings.php';
