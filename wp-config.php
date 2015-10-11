<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/var/www/wonder/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'wonder');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', '940629cqc');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8mb4');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'hSh[`oEi<9|B;V3fG.<OIq!+JFt!xmG8J}JOU.c9~|a)N[68;ADD$dQRf&qkA;0s');
define('SECURE_AUTH_KEY',  'Vv[&V+L?k*c?I<~XrRZ{Uh&Sa%ZPqM(o;eNS5.r=&#gD<7T1Vy eO;w9|a3_!9=E');
define('LOGGED_IN_KEY',    '1iHwKc[%nA]Y@nBe$Cw]+j|ST!$pUIO^8;JA2||}][pdon.CFjTn+r124G1:+irA');
define('NONCE_KEY',        'e8&Lj9wi%vj;bmPz0oz.PY|db{4^);woUXIVb4:HByf;R;`H_!c%0%F*2Rc+;J;_');
define('AUTH_SALT',        'N|N%;+r?W9U?NN2B[M}&1.qY5e[-ki,|)vb5|40J!~%?D/(^+RGh~-:Q|ZV%7Dco');
define('SECURE_AUTH_SALT', '6B]3be>s709K-n@rlk%uiJXJ#LQ7Xsa.zf>&T9B;^a{ S[Y*0IT}+RWnD0)heorq');
define('LOGGED_IN_SALT',   'W[!Yg]Hkr.)t(w30dVXK$;>AU%X-(l^VDIj{JXa4!+^NKAmsf3*%V.#+?ixI:~a}');
define('NONCE_SALT',       ';Wb;fK9SlYJs)BY>1y?QC[0Zr;RWH#jv$)2@IddY++FRC/|t^D^[nA&D?35z1H{R');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
