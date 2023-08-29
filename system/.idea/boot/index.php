<?php
/** .-------------------------------------------------------------------
 * |  Software: [DN Framework]
 * |--------------------------------------------------------------------
 * |    Author: 王迈新
 * | Copyright (c) 2022
 * '-------------------------------------------------------------------*/
namespace System;

require __DIR__ . '/../../../vendor/autoload.php';

$msg = '';

if($msg) {
    die('<h1 align="center" style="margin-top: 20px;">' . $msg . '</h1>');
}

use System\App;
App::start();



?>