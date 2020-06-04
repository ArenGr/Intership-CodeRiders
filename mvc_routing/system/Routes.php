<?php
namespace system;
use controllers\Default_Ctrl;

class Routes {

    function __construct($components){

        $components = explode('/', $components);
        array_shift($components);

        if (!empty($components[0])) {
            $ctrl_class = 'controllers\\'.ucfirst($components[0]);
            if (class_exists($ctrl_class)){
                $ctrl_obj = new $ctrl_class();
                if (!empty($components[1])){
                    $ctrl_method = $components[1];
                    if (method_exists($ctrl_obj, $ctrl_method)){
                        $ctrl_method_args = array_slice($components, 2);
                        call_user_func_array(array($ctrl_obj, $ctrl_method), $ctrl_method_args);
                    }else{
                        if (method_exists($ctrl_obj, 'index')) {
                            $ctrl_obj->index();
                        }else{
                            echo "ERROR: method index not found";
                        }
                    }
                }
            }else{
                echo "Class dosn`t exists!";
            }
        }else{
            if(class_exists('controllers\\Default_Ctrl')){
                new Default_Ctrl();
            }else{
                echo "ERROR: default class dos\'nt exist";
            }
        }
    }
}


