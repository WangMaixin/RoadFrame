<?php
namespace Boot\Controller;


// 此文件通过index.php文件无法访问
class Controller {
    public function run() {
        var_dump('controller');
    }
}
?>