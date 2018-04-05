<?php

namespace myforum\core;

class Router
{

    private $args = null;
    private $arrayUrl;

    public function __construct()
    {
        $this->arrayUrl = explode('/', $_SERVER['REQUEST_URI']);
    }

    public function run()
    {
        $this->setArgs();
        $this->parseUrl();
    }

    private function parseUrl()
    {
        $ctrlRequest = !empty($this->arrayUrl[1]) ? $this->arrayUrl[1] : 'Main';
        if(is_numeric($this->arrayUrl[1]))
        {
            $ctrlRequest = 'Main';
        }
        $this->class = 'app\controllers\\'.ucfirst($ctrlRequest).'Controller';
        if( class_exists($this->class) ) {
            $controller = new $this->class;
            $actRequest = !empty($this->arrayUrl[2]) ? $this->arrayUrl[2] : 'Index';
            if(is_numeric($this->arrayUrl[1]))
            {
                $actRequest = 'Index';
            }
            if(method_exists($controller, $actRequest)){
                $controller->$actRequest($this->args);
            }else{
                throw new \Exception("Method $actRequest not found", 404);
            }
        }
        else{
                throw new \Exception("Controller $this->class not found", 404);
            }
    }

    private function setArgs()
    {
        $this->args = array_slice($this->arrayUrl,3);
        if(count($this->args) == 1 && count($this->args) > 0)
        {
            $this->args = $this->args[0];
        }
        else{
            $argPare = array_chunk($this->args, 2);
            if((count($this->args) % 2) == 0) {
                foreach ($argPare as $pair) {
                    $arg[$pair[0]] = $pair[1];
                    $this->args = $arg;
                }
            }
        }
        if(is_numeric($this->arrayUrl[1]))
        {
            $this->args = $this->arrayUrl[1];
        }
        return $this->args;
    }
}