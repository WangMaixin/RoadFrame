<?php
/** .-------------------------------------------------------------------
 * |  Software: [DN Framework]
 * |--------------------------------------------------------------------
 * |    Author: 王迈新
 * | Copyright (c) 2022
 * '-------------------------------------------------------------------*/
namespace System;

use System\router;
use System\Config;

class App {


    public static function start() {
        self::runAction();
        echo self::loadConfig('data','type');
    }


    private static function loadConfig($senior,$lower) {
        return Config::Get($senior,$lower);
    }

    
    private static function runAction() {
        $path_arr = router::Path();     // 获取类名和方法名
        $class_name = $path_arr['class_name'];

        try {
            $class = new $class_name();
            $method = $path_arr['action'];
            if(method_exists($class,$method)) {     // 方法是否存在
                return $class->$method();
            }else {
                throw new \Exception('Controller'.$class_name.'No method exists'.$method);
            }
        }catch(\Throwable $e) {
            throw new \Exception('No method exists'.$class_name);
        }
    }
}
?>