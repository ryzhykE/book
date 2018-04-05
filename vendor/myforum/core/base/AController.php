<?php

namespace myforum\core\base;

use myforum\core\Tsingleton;

abstract class AController
{
    use Tsingleton;

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

}