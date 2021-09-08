<?php


define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

// 
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);


define('ADMIN_LOGIN', 'admin');
define('ADMIN_PASSWORD',  md5('123'));
define('SALT',md5('6TWW7Y3EUQY87723YQWUY8723'));

define('RECORDS_PER_PAGE', 3 );


/**
 * База данных - параметры
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mini');
define('DB_USER', 'mini');
define('DB_PASS', 'Mini123mini');
define('DB_CHARSET', 'utf8');