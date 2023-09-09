<?php
/** .-------------------------------------------------------------------
 * |  Software: [DN Framework]
 * |--------------------------------------------------------------------
 * |    Author: 王迈新
 * | Copyright (c) 2023
 * '-------------------------------------------------------------------*/
namespace Attach;

class Format {
    public static function error_text($scale,$type,$code,$text) {
        $msg  = '<p><span style="font-weight: 700;">' . $scale . '[' . $type . '(' . $code . ')' . ']</span>: ' . $text . '</p>';
        return $msg;
    }
}
?>