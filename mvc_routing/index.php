<?php
use system\Routes;

spl_autoload_register(function($class_name){
    include str_replace("\\", DIRECTORY_SEPARATOR,  $class_name) .".php";

});

$url_path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$routes = new Routes($url_path);
