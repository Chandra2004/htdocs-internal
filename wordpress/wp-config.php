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
define( 'DB_NAME', 'db_wordpress' );

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
define( 'AUTH_KEY',         'i3N@:42gbzGzNHqgn<X0y@sym:.8M~AX<Sr)$L9T9+m.d8~$mva5K{@l}pknf9t&' );
define( 'SECURE_AUTH_KEY',  'q8/xhy!Ur~|4+.%fh:Kys1xwRTiv w 8N*Qm/q!%s(BvqrB)G:<@C5fXt&!L.h~o' );
define( 'LOGGED_IN_KEY',    'D{ U}!<H_}5uAfeBEn1wsU3yYEMd+HE:}7T76Y%)2n1#RWfI4_(=9N0/}UJe w:V' );
define( 'NONCE_KEY',        '9vqJ.aKWRd)@ZF[[&_6sKq1Oj:wpD@lq?cmH7*HM*|P^??f7:)c$>p/&ab%w<DuS' );
define( 'AUTH_SALT',        'kiP*P:Jf/Pg4mW`6TNYuz}%nmMjXcO[aZ _}?tAb6&}9lLH6l9mbss/5aJoSHrRy' );
define( 'SECURE_AUTH_SALT', 'i5Gg=0`R{X~y`2WlCfLhF /k0g}.7hwaZKNyg~0M)V`}Z<eut~a[mF#--Y/2.ap.' );
define( 'LOGGED_IN_SALT',   '`PMa-:}/qz}sL:%%l)|HEm{q:Pix[}Kl0ba<eb3_lqJYOW$ZwRRwhU^V4+NJNhR`' );
define( 'NONCE_SALT',       'CsE=cB&YSB5:8ozr/Fnx]@KC-#!(@ wu?=.c<]0! s&y*V|DNcD&MIgARN^|N8>;' );

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
