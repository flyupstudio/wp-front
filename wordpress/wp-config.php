<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'projectname');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'BTkB2VbCa*Bo{0B%~#Jt]-v(I,tDjA&{%OpVO^0~t>3DV*jXS5+? Wuv=<Gk6tkf');
define('SECURE_AUTH_KEY',  ':jrxV0dWUjd}Z]Rr8Qst=]ko([l%kJ8I6Hzbl M(L6URx@m:GAA3EA)>btD-S2_D');
define('LOGGED_IN_KEY',    '2RM_/of(*KA;,42^c5tZ*q+T@6Q+Nbq:gkI_L#oe>a$9T&/?);Ng|v]pCsf~vH4F');
define('NONCE_KEY',        'b>beF`a$O{>g)KB926*/Ny?=nTNf!5 ^ri$2_tD`wcp$zmqBh-Kg>/<69S*.H71_');
define('AUTH_SALT',        '81VKeF lY7jFGM}hbV:V7Tox@Xej,A@o.682J%QTB3cMY@|s]A$wlShYEc!V!)e{');
define('SECURE_AUTH_SALT', '?8P;9Ghz1&>r<2ZK<;42]$zoc/OSXsCB2[k=F$q#<yk8Ro/DhPl{[6xWy|ZQNxL)');
define('LOGGED_IN_SALT',   'j]>c_]fNI+c_/I50&@u)Mh=z8L3ZD7[iwbA4o?}P4[RDxg.OKRc0`6PB~scgOovm');
define('NONCE_SALT',       'q}SS$2,en|>qj[pT+E@ [$(a|Am@j^Cyo_ccE#FXCx7|gx0t(g{1L6%H=mQbcpVk');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
