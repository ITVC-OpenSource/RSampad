<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
define('WP_CACHE', true);
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
define('DB_NAME', 'rsampadi_DBrsampad');

/** MySQL database username */
define('DB_USER', 'rsampadi_DBrsampad');

/** MySQL database password */
define('DB_PASSWORD', 'jK~$P}GPcC^;');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '`+L.p& ]{Q6*_)|ji>I2dNaOp]SP6$MdeISKr_nY6uz!ewBfHK|y2<r,|BE%U0UO');
define('SECURE_AUTH_KEY',  'xG`E~ag)c)J{-BCLTY66CQRhMI@kl~7S9.S~ax|RUS(RHC3YZ-HvkQEHqys@9-r%');
define('LOGGED_IN_KEY',    'X5eAc;3)IyUFf@wS7R)i7qL&|tdQ/>{LJ3wV?9J,%UtRymJ~|w<{c#fTYk#vz:W]');
define('NONCE_KEY',        '9i >e(mnV4,Rn;qmv3!?;YKppI-%`[3uYF|:g3[vT|d#wsRyH45dtbcnl87 *FN,');
define('AUTH_SALT',        'yl[Z#)*i_@4+EqOEK,uxB~#;{=$^D]%aoU!xsw=z3jmKx~mDH=vBiF#%|bjYAd5W');
define('SECURE_AUTH_SALT', '!(I[WL:.z6Ow*udfkQun8$:1ZtY7pDvPsL]G9!@y5RAW6m8dDHtK7xd2.xE ;SHi');
define('LOGGED_IN_SALT',   '&eS5*6Hg;T-OJR|pm63Rqh0U*[?$T8V2RVRUT}MEZk=b?7|-DwA?eIvKBWOB[Yhu');
define('NONCE_SALT',       '!yTBH^2ado{,1>ALej-vT[y/3U`5v<DXk$O0ppDh5(@Hc$4dGdK(op_;2l?a|g|K');

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
