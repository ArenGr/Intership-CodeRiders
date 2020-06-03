<?php
use system\Routes;

spl_autoload_register(function($class_name){
    include str_replace("\\", DIRECTORY_SEPARATOR,  $class_name) .".php";

});

$url = array();

$url_path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$url_query = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY));

array_push($url, $url_path);
array_push($url, $url_query);

$routes = new Routes($url);























// point 1

// $components --> array

// new /system/Routes($components);


/*

    1. get url components
    2. if component1 exists ---> if class_exists($class_name)
    3. if class exists ---> create object ( $ctrl_obj = new $class_name)
    4. if component2 exists ---> if method_exists($ctrl_obj, component2) --> $ctrl_obj->$component2($component3, $component4)


$class_name = "controllers\\".ucfirst($component1)

    doamin.am/settings/general

 */


