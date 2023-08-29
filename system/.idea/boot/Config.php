<?php
/** .-------------------------------------------------------------------
 * |  Software: [DN Framework]
 * |--------------------------------------------------------------------
 * |    Author: 王迈新
 * | Copyright (c) 2022
 * '-------------------------------------------------------------------*/
namespace System;

class Config {

    /**
     * Time: 2023/8/29 17:28
     * @param mixed $senior 一级参数名
     * @param mixed $lower 二级参数名
     */
    public static function Get($senior,$lower) {
        $json_array = self::Json();
        return $json_array[$senior][$lower];
    }

    /**
     * Time: 2023/8/29 17:29
     * @include Config file
     */
    private static function Json() {
        $json_string = file_get_contents(_CONFIG);  // 获取JSON
        $data = json_decode($json_string, true);

        return $data;
    }

    private static function Filter() {
        // Filter
    }
}
?>