<?php


namespace Boot\Controller;

use Boot\Controller\Controller;

class IndexController extends Controller {
    public function run() {
        var_dump('index-controller');
        echo '<br>';
    }
}
?>