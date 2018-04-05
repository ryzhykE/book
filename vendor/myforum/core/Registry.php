<?php

namespace myforum\core;

use myforum\core\Tsingleton;

class Registry
{
    use Tsingleton;

    protected static $properties = [];

    public function setProperty($name, $value)
    {
        self::$properties[$name] = $value;
    }

    public function getProperty($name)
    {
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }
}