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
define( 'DB_NAME', 'pwg' );

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
define( 'AUTH_KEY',         ',Nv ^=>uD:|=|cZ4!N&Js %1H,~/Rn^9MR?HUm>RryiV8//|k+;L,.yqv+?pQ]/_' );
define( 'SECURE_AUTH_KEY',  '$yn(oVx[4;L5DrePBD9!Wc*fq? rp|D_1n.9>9@6;*(QJX%x6](2mSb;snnU~si,' );
define( 'LOGGED_IN_KEY',    'kgQ48IsLoD+#}N]Hev6[9o]8j|!+ P+7!|8_Y#9?D|-1H~:oF?J:DX 4?E4X?{}.' );
define( 'NONCE_KEY',        '_Xn2a@)_@&?gR<Vx jjCG]e||o$9o)A9D6[h!s42uy,itVNa6pjTZvU6VNoxO@I6' );
define( 'AUTH_SALT',        'aZriKfwvI#Zu8q~7c=Pm_jI,pc#<1hp?$ >@o6^Av[U9r77qe~EG^z#M<7SFzR[]' );
define( 'SECURE_AUTH_SALT', 'TYlIp&r(U`M|]qQ%|a~Pj +/|G?r98`dd-eqrVAlv$f&|Ef<v}5TOu@G#,2=D74r' );
define( 'LOGGED_IN_SALT',   'jo6unT`)5puF<3YwxtZS#NwzVvQ63ZUY;];6N5WPa+^/XSh7.56pPSC!?_OHvu2l' );
define( 'NONCE_SALT',       '4c|_xXd6|RxoH&T#>&nSgE9HGnfHJ$>ltSJP[Nq0x[T=QW4.$Tenrzi@VK`.-3zD' );

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


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

// Enable debugging
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true); // Set to false to avoid showing errors on front end
define( 'QM_ENABLE_CAPS_PANEL', true );

// Optional but recommended for development:
@ini_set('display_errors', 0);

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
