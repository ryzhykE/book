<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 23.03.2018
 * Time: 20:11
 */

namespace myforum\core;


trait Tsingleton
{
    protected static $instance = null;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        if (null === static::$instance){
            static::$instance = new static;
        }
        return static::$instance;
    }
}