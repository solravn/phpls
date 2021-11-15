<?php

/**
 * $_SERVER
 * $_POST
 * $_GET
 * $_SESSION
 *
 * MCV
 * Model = работа с данными
 * View = отображение (html + css)
 * Controller = управляющий
 */

require '../app/User.php';

$requestUri = $_SERVER['REQUEST_URI'];

$uriParts = explode('/', substr($requestUri, 1));

$controllerName = $uriParts[0]; // user
$actionName     = $uriParts[1] ?? null;

if (empty($controllerName))
{
    http_response_code(400);
    echo 'Controller is empty';
}

$controllerName  = strtolower($controllerName);
$controllerClass = ucfirst($controllerName) . 'Controller';
$controllerFile  = '../app/Controller/' . $controllerClass . '.php';

if (file_exists($controllerFile))
{
    require $controllerFile;

    $controller = new $controllerClass;

    $action = !empty($actionName) // if
        ? strtolower($actionName)
        : 'index';

    $actionMethod = 'action' . ucfirst($action);

    $controller->{$actionMethod}();
}
else
{
    http_response_code(404);
    echo 'pizdec';
}

