<?php

namespace myforum\core;

class ErrorExeption
{
    public function __construct()
    {
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'myException']);
    }

    public function myException($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError($e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Error: {$message} | File: {$file} | Line: {$line}\n|\n", 3, ROOT . '/tmp/errors.log');
    }

    protected function displayError($errstr, $errfile, $errline, $responce = 404)
    {
        http_response_code($responce);
        if($responce == 404 && !DEBUG){
            require WWW . '/errors/404.php';
            die;
        }
        if(DEBUG){
            require WWW . '/errors/dev.php';
        }
        die;
    }

}