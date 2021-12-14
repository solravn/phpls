<?php

use App\Core\Pimp;
use App\Core\Settings;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// константы
const APP_DIR = __DIR__;

require_once '../vendor/autoload.php';

function dump($var)
{
    echo '<pre>' . print_r($var, true) . '</pre>';
}

//register_shutdown_function(function ()
//{
//    $error   = error_get_last();
//    $message = $error['message'] ?? '';
//    $file    = $error['file'] ?? '';
//    $line    = $error['line'] ?? '';
//
//    $errorStr = $message . PHP_EOL . $file . ':' . $line;
//
//    $loader = new FilesystemLoader(APP_DIR . '/view/');
//    $loader->addPath(APP_DIR . '/view/', 'template_path');
//    $twig   = new Environment($loader);
//
//    echo $twig->render('error.twig', ['error' => $errorStr]);
//    exit;
//});

$config = require '../config/settings.php';
$settings = new Settings($config);

Pimp::app()->run($settings);
