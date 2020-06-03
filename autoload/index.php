<?php
spl_autoload_register(function($class_name){ 
    require str_replace("\\", DIRECTORY_SEPARATOR, $class_name).'.php';
});


use \f2\f3\B as B;
$obj = new B();

