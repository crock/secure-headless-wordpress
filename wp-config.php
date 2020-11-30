<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['DB_NAME'] );

/** MySQL database username */
define( 'DB_USER', $_ENV['DB_USER'] );

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );

/** MySQL hostname */
define( 'DB_HOST', $_ENV['DB_HOST'] );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', $_ENV['DB_CHARSET'] );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', $_ENV['DB_COLLATE'] );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
$secure_hash = password_hash( $_ENV['SECURE_PHRASE'], PASSWORD_DEFAULT );

define( 'AUTH_KEY',         isset($_ENV['AUTH_KEY']) ? $_ENV['AUTH_KEY'] : $secure_hash );
define( 'SECURE_AUTH_KEY',  isset($_ENV['SECURE_AUTH_KEY']) ? $_ENV['SECURE_AUTH_KEY'] : $secure_hash );
define( 'LOGGED_IN_KEY',    isset($_ENV['LOGGED_IN_KEY']) ? $_ENV['LOGGED_IN_KEY'] : $secure_hash );
define( 'NONCE_KEY',        isset($_ENV['NONCE_KEY']) ? $_ENV['NONCE_KEY'] : $secure_hash );
define( 'AUTH_SALT',        isset($_ENV['AUTH_SALT']) ? $_ENV['AUTH_SALT'] : $secure_hash );
define( 'SECURE_AUTH_SALT', isset($_ENV['SECURE_AUTH_SALT']) ? $_ENV['SECURE_AUTH_SALT'] : $secure_hash );
define( 'LOGGED_IN_SALT',   isset($_ENV['LOGGED_IN_SALT']) ? $_ENV['LOGGED_IN_SALT'] : $secure_hash );
define( 'NONCE_SALT',       isset($_ENV['NONCE_SALT']) ? $_ENV['NONCE_SALT'] : $secure_hash );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = $_ENV['DB_PREFIX'];

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
define( 'WP_DEBUG', $_ENV['WP_DEBUG'] );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
