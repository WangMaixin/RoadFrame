<?php
/** .-------------------------------------------------------------------
 * |  Software: [DN Framework]
 * |--------------------------------------------------------------------
 * |    Author: 王迈新
 * | Copyright (c) 2022
 * '-------------------------------------------------------------------*/
namespace System;

// 路由核心代码

class router {


    /**
     * Time: 2023/8/13 22:41
     * @abstract Return domain path
     */
    public static function Path() {

        if(self::FilterPath()['param']) {
            return [
                'class_name' => '\\Boot\Controller\IndexController',
                'action' => 'run'
            ];
        }
        
        if(!self::FilterPath()['format']) {
            return '<p><span style="color: red";> ERROR!</span> [#DOMAIN NAME FORMAT]</p>';
        }
        
        return self::GetPath();
    }


    /**
     * Time: 2023/8/13 22:52
     * @abstract Filter illegal data
     */
    private static function FilterPath() {
        $format = strripos(self::GetPath()['format'], ".php")?true:false;   // 域名的倒数第三个参数是否为php文件
        $param = strripos(self::GetPath()['action'], ".php")?true:false;
        return [
            'format' => $format,
            'param' => $param
        ];
    }


    /**
     * Time: 2023/8/13 22:53
     * @var ClassActionFormat
     * @version 202308132304
     */
    private static function GetPath() {
        // $path = empty($_GET['p'])?'index/index':trim($_GET['p']);   // 获取域名参数
        $path = $_SERVER['REQUEST_URI'];    // 获取域名后缀信息
        $path_arr = explode('/',$path);   // 将路径通过/分开并组合成数组
        $path_arr_length = count($path_arr);    // 计算数组长度
        $class_name = "\\Boot\Controller\\";

        // 拆分参数
        $class_name .= ucfirst($path_arr[$path_arr_length - 2]).'Controller';  // 获取类名
        $method_get_name = $path_arr[$path_arr_length - 1]; // 获取方法名
        $format = $path_arr[$path_arr_length - 3];  // 获取入口文件格式

        return [
            'class_name' => $class_name,    // 对象名
            'action'=> $method_get_name,   // 方法名
            'format' => $format
        ];
    }


    private static function GetJson() {
        // ...
    }
}

?>