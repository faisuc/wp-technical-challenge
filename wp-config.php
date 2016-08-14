<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'technical_interview');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'candidate');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'jZ1S]i{Kh<wg(20RrS6ckrY VF-d-OtX3MUtU_(Mo||poN3[]0kL9)LV(OGFg.!(');
define('SECURE_AUTH_KEY',  'z[A<55Of72.>/Yd@4X, *|UFbL{:B~rs*F5qzHL8~PHX@0=]rWlH^J9 CP^pi aT');
define('LOGGED_IN_KEY',    ':E-^7/cb8;!mM|lMCy(x/)0[ziPT3_&*FsB$$10$-_E8n{Sz{wvL`ko@_t|Jk_GR');
define('NONCE_KEY',        ']B+&`i5Jf%z%: ;~/ou_IT+w;Uy>`ngfY3kj^49~o(d-*K3/zfTFG773>bXF_+{6');
define('AUTH_SALT',        '+Rk.evGo|EA!olN/+6Z1CrbVG@!^uTVGq1$a~x>w4}NbfG3MHj~!,PjLiXq+7<(t');
define('SECURE_AUTH_SALT', '#Vx4U%Y*V;q[+/6*^Wrw5/FO+iA]z9}lv3P?Pi1Nm1GOj*YX_,l^-O>.cc~_jm>I');
define('LOGGED_IN_SALT',   'K1ZxA%1kUXy``D,?v pJUYuijLa?4K-zG+za&La*W3+ Lp]6>UMv+7| <JX2/[qh');
define('NONCE_SALT',       '-!8~:<a2GNX7$_Nqi9Y2VJ._+Z#s&q.1// ~r1EXB>fE6TtXl~Sy+mh-Y4{HF6@v');


$table_prefix = 'wp_';

define('WP_DEBUG', true);
define('WP_MAILCATCHER', true);
define('FS_METHOD', 'direct');


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
