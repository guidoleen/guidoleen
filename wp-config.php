<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'portfolio');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'guidoleen');

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
define('AUTH_KEY',         'H7nHm06+-C]=%4>r.dHL~9CE!qts|[8spN|./ b*{ffDWhWZ[4u<nj|P_N|abyP]');
define('SECURE_AUTH_KEY',  'Az+x=)qlm`L2tV3EJznX0u<@yYRp=_+_0UShz@.g8| ow(hq=I+aC:E%4*gx~,q_');
define('LOGGED_IN_KEY',    'SS,CvIE5O[OXnVn:kOaK8)3h+Q$fF!!9Uq9-0uPz{5RUKtT(~|eM=c?d LgXna^t');
define('NONCE_KEY',        'bX?}v~=z%yA+b|X2_L(`,>U&9LscClgsTGr[EA<nMxD@f<HEO$,Z)-PmqR/0 X<A');
define('AUTH_SALT',        '++Jh>NkKMTi]5Q/?((m/+>7f/]/.:-=i+}ndEgqt?-Fyh]-M013K.2ej_uI9,[%t');
define('SECURE_AUTH_SALT', 'E1``A%Jvc<S2|LKi~f9aM-}e@+Kb#NHtU5>oQ|jh!5j:7E[-v;hlXsxn+j2 =><$');
define('LOGGED_IN_SALT',   ',nJjyjgQQH&rWPrKy!H1Qw%]JP@Kr4?mX3a+,M:)vH3xH0Z=8e[[xC>$ZqLOWG#=');
define('NONCE_SALT',       'v= U,|K{wWt5y31.Duw&=uZe4foN0eNi<Z: zwg|!)w1~3]B|b(j*H4}?<takPHK');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'nl_NL');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
