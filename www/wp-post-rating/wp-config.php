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
define( 'DB_NAME', 'wp-post-rating' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'HWKOpNwtViNXiaclHzZFLCJV5dqy7O5ToR3AW7BoFiQBRmk2NGCnMPprDHLj7cXA' );
define( 'SECURE_AUTH_KEY',  'ksSpMCr9uM7Bbl13mn2QZ270WFacf7xHkKvXIfa17f6RsgatDJHpYJFRy7EKYB84' );
define( 'LOGGED_IN_KEY',    'EuWmzCLUzmSS8yI8Xx5ITzaFjSSDkz1Ywh9HWWYxwZDYih8Q28XaYnI7hBY6FvOR' );
define( 'NONCE_KEY',        '8RmBXctxSzdx0DlHnjl4oCABlCHocQ90nKzuJnyyXagmNmzGaVNPDtxKYQMA7i4b' );
define( 'AUTH_SALT',        'FIO4wJHMkJKZunH99jgujhM8TNSSrJgutGDQJEJVnpstyJET9gAV1EqtpnrrBgro' );
define( 'SECURE_AUTH_SALT', 'mSDMHQiS1xQPUZY6HVppPrk36vaGvq5KdxvfiFFMP5JSZafAP1XU3h4BPDztQ8n7' );
define( 'LOGGED_IN_SALT',   'jww0sMuR0et2gzlDjdxFFsbGNruHDWSwGMdiq9kJiXHqauImZobahbTUsMhBguNu' );
define( 'NONCE_SALT',       'jZLACmw4mBuPonXPnUciEmCaFwAheFm3yv8RWycNLcbwKz5f5C4TqrpAknBxnzBu' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
