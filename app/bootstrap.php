<?php

// константы
const APP_DIR = __DIR__;

require_once '../vendor/autoload.php';

function dump($var)
{
    echo '<pre>' . print_r($var, true) . '</pre>';
}

require_once 'router.php';
