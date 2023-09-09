<?php
/** .-------------------------------------------------------------------
 * |  Software: [DN Framework]
 * |--------------------------------------------------------------------
 * |    Author: 王迈新
 * | Copyright (c) 2023
 * '-------------------------------------------------------------------*/
namespace System;

use System\router;
use System\Config;
use Attach\Format;

class App {


    public static function start() {
        self::runAction();
        // echo self::loadConfig('data','type');
    }


    private static function loadConfig($senior,$lower) {
        return Config::Get($senior,$lower);
    }

    
    private static function runAction() {
        $path_arr = router::Path();     // 获取类名和方法名
        $class_name = $path_arr['class_name'];

        try {   // 标记一段可能出现错误的代码出现错误后进入catch
            $class = new $class_name();
            $method = $path_arr['action'];
            if(method_exists($class,$method)) {     // 方法是否存在
                return $class->$method();
            }else {
                throw new \Exception('Controller'.$class_name.'No method exists'.$method);
            }
        }catch(\Throwable $e) {
            echo Format::error_text('ERROR','Router','1011','Please check the class name or method name!');
        }
    }
}
?>