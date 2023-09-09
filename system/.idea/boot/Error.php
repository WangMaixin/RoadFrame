<?php
namespace System;

// 错误处理引擎

class Error {
    protected $debug;
    public function __construct($debug = true) {
        $this->debug = $debug;
    }
    public function error() {
        error_reporting(0);   // 关闭所有错误显示
        set_error_handler([$this,'handle'],E_ALL | E_STRICT);   // 使用用户定义的错误处理程序
    }
    public function handle($code, $error, $file, $line) {

        $msg = $error . "($code)" . $file . "($line)";

        if($this->debug) {
            echo $msg;
        }else {   // 当debug = false时执行下面
            # 使用日志保存错误
            $file = 'logs/' . date("Y_m_d") . '.log';   // 路径都是相对于index.php
            error_log(date('[c]') . $msg . PHP_EOL, 3, $file);
        }

    }
}
?>