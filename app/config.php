<?php

define ('DS', DIRECTORY_SEPARATOR);
$sitePath = realpath(dirname(__FILE__).DS);
define('SITE_PATH', $sitePath);
define('DB_USER', 'test');
define('DB_PASS', 'test');
define('DB_HOST', 'localhost');
define('DB_NAME', 'task_manager');
define('DB_TABLE', 'tasks');

$bd = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($bd->connect_error)
    die("Ошибка подключения к бд ".$bd->connect_errno());
$bd->query('SET names "utf8"');
Registry::set('bd', $bd);
Registry::set('countOnPage', 3);
Registry::set('leftLimitMax', 2);
Registry::set('rightLimitMax', 2);
Registry::set('sort', 0);