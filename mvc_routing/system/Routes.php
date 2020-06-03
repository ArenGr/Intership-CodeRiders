<?php
namespace system;

class Routes {

    function __construct($components){

        $arr_components = explode('/', $components[0]);
        array_shift($arr_components);

        $routing = array(
            'settings' => array(
                'controllers'=>'Settings', 'action' => 'general'
            ),
            'other' => array(
                'controllers'=>'Other', 'action' => 'general'
            )
        );

        if (!empty($arr_components[0])) {
            if (array_key_exists($arr_components[0], $routing)){
                $controller = 'controllers\\'.$routing[$arr_components[0]]['controllers'];
                if (class_exists($controller)){
                    $controllerObj = new $controller();
                }else{
                    echo "Class dosn`t exists!";
                }
                if (!empty($arr_components[1])){
                    $method = $arr_components[1];
                    if (method_exists($controllerObj, $method)){
                        if (isset($components[1])){
                            $arr_components_query = explode('?', $components[1]);
                            call_user_func_array(array($controllerObj, $method), $arr_components_query);
                        }else{
                            //Without parameters
                        }
                    }else{
                        echo 'Method dosent exists';
                    }
                }else{
                    // Without methods
                }
            }else{
                echo "In controllers folder there isnot such file";
            }
        }else{
            // Main page
        }
    }
}
