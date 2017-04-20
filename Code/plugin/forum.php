<?php
/**
* Database
**/
require '../inc/db.php';

$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

/**
* Constantes
**/
define('DS', DIRECTORY_SEPARATOR);
define('VIEWS', __DIR__ . DS . 'views' . DS);
define('ELEMENTS', __DIR__ . DS . 'views' . DS . 'elements' . DS );

/**
* Autoloader
**/
spl_autoload_register('autoload');
function autoload($class){
    require 'class' . DS . str_replace('\\', DS, $class) . '.php';
}

/**
* Routing
**/
if (!isset($_GET['p'])) {
    $_GET['p'] = 'home';
}
if (!preg_match('/^([a-z0-9A-Z]+\.?)+$/', $_GET['p'])) {
    $page = 'errors/404';
} else {
    $page = implode('/', explode('.', $_GET['p']));
}


/**
* Génération de la vue
**/
if (file_exists('views/' . $page . '.php')) {
    ob_start();
    try{
        require 'views/' . $page . '.php';
    } catch (Exception $e) {
        require 'views/errors/404.php';
    }
    $content = ob_get_clean();
}else {
    ob_start();
    require 'views/errors/404.php';
    $content = ob_get_clean();
}

require 'views/layouts/default.php';