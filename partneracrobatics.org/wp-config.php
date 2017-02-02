<?php
/** Enable W3 Total Cache */
 //Added by WP-Cache Manager

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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
 //Added by WP-Cache Manager
//define('WP_CACHE', false); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '' ); //Added by WP-Cache Manager
define('DB_NAME', 'i3251526_wp3');

/** MySQL database username */
define('DB_USER', 'i3251526_wp3');

/** MySQL database password */
define('DB_PASSWORD', 'G#qkcy7NufDe7O]RAE.00.]4');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '26K1pF1SJQj0IkNBFqOY6F0XHCQ0C7cTicAL7TzaIsKUXSFiu5fgWzj1aiUfYjeg');
define('SECURE_AUTH_KEY',  'Rb8Zy2aXQdFxt6Uu6eodFaqLGtB4xip4XZkNWoTdNPR4oT6kNsT4Po96YlucicIg');
define('LOGGED_IN_KEY',    'NXrPl8aL4d9mbUxrUz6tGf3vVRkruiN0JfzakZ3FNWmPRdfB2W4M5GSlXM4CPKLk');
define('NONCE_KEY',        'G22QM8R2rrRmJSLOAqN2R84in3N6kwQFztvBENIZrRTK81M3dje7a1KZ8Du3wEXn');
define('AUTH_SALT',        'ifNjzRMQjs167JGi5pnWkkfjgjuqZD9220lxSmhbILnnyyWxkIYPffEtyPjYK6QF');
define('SECURE_AUTH_SALT', '17OuMxXQcMnItkoucJffsOjnhPWTENcKwPelnOZGyxnCkaiJaHKzJPZouSDsC1bG');
define('LOGGED_IN_SALT',   '8jAHN7Qhnk0gAkfcWIJNJb2is7TNw0La5B6cRbNSZtq9OaNH2PEZIwlPE7UIN8ze');
define('NONCE_SALT',       'UBpH2aQMypnRZH1hGfU6S7VaYt9quVcsNxJUcgg8jMiA8PBBjVmH7mmtoPcV83bq');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
