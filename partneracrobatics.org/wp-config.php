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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
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
define('AUTH_KEY',         'Esfx6UXnwLUzfKom9VuhTmUr0xtuICLbLFNerG97yizlVLccbDHdQj9VghwbvkO2');
define('SECURE_AUTH_KEY',  'JeUCRbE9dAvfxDKafc7Y8nrQjwwO1Hr0CU2lH7sN9VofwIzgyX1vk287kkqYcTqB');
define('LOGGED_IN_KEY',    'GbmKpCNbiuTihM7Ie3Sp191a9US5IGbLMyRHIfzU9qDMFZlzZFleSYHmAQbp5YGP');
define('NONCE_KEY',        'rAqap35E2Ii3Uexfsw01TSZcNaNocpo5dubO2XPeQDJ43Hi1taV6Rjy1i3FU16ak');
define('AUTH_SALT',        'I4aDKQ9xBM4DDFEwoss3IrvhYk7JTPmwZNoCXdV6GVo0LdNuOy98OvTxHc0oWCCR');
define('SECURE_AUTH_SALT', 'vSnr1KrgaSyxyPTWVQF4Cngpm28WIHmDaiWhnQMd8MQudFthLt3HxJ5iUh63DPix');
define('LOGGED_IN_SALT',   'nl5q75lxhCCNx2GvWbABSzkiSKBBaOIqx046gDhJ1ocjIutyjJcN6bVbB2ZzyiIk');
define('NONCE_SALT',       'ogmqwIXPz9spXy38AMAsivmfCel9We9bDpfZ5pBRYM3W13ReMaTiS0qFisl2r5O1');

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
