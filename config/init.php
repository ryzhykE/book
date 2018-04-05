<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/myforum/core');
define("CONF", ROOT . '/config');

require_once ROOT . '/vendor/autoload.php';