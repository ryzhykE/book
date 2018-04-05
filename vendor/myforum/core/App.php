<?php

namespace myforum\core;

use myforum\core\base\Db;

class App
{
    public static $app;

    public function __construct()
    {
        session_start();
        self::$app = Registry::getInstance();
        $this->getParams();
        new ErrorExeption();
        $rout = new Router();
        $rout->run();
        DB::getInstance();
    }

    protected function getParams()
    {
        $params = require_once CONF . '/params.php';
        if(!empty($params)){
            foreach($params as $k => $v){
                self::$app->setProperty($k, $v);
            }
        }
    }


}