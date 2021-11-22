<?php

// константы
const APP_DIR = __DIR__;

require_once '../vendor/autoload.php';

function dump($var)
{
    echo '<pre>' . print_r($var, true) . '</pre>';
}

// todo replace
require_once 'core/ControllerPrototype.php';

require_once 'core/router.php';
