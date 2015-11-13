<?php



if(defined('DS')){
    return null;
} else {
    define('DS', DIRECTORY_SEPARATOR);
}


if(defined('SITE_ROOT')){
    return null;
} else {
    define('SITE_ROOT', 'C:' . DS. 'wamp' . DS .'www' . DS . 'php' . DS . 'gallery');
}

if(defined('INCLUDES_PATH')){
    return null;
} else {
    define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');
}




require_once("function.php");
require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once(INCLUDES_PATH.DS."photo.php");
require_once("session.php");
require_once("comment.php");
require_once("paginate.php");







