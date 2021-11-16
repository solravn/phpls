<?php

/**
 * $_SERVER
 * $_POST
 * $_GET
 * $_SESSION
 *
 * MVС = CMV
 * Model = работа с данными (БД)
 * View = отображение (html + css)
 * Controller = управляющий
 */

$requestUri = $_SERVER['REQUEST_URI'];

$uriParts = explode('/', substr($requestUri, 1));

$controllerName = $uriParts[0] ?? null;
$actionName     = $uriParts[1] ?? null;

$controllerName  = $controllerName ? lcfirst($controllerName) : 'site';
$controllerClass = ucfirst($controllerName) . 'Controller';
$controllerFile  = '../app/Controller/' . $controllerClass . '.php';

if (file_exists($controllerFile))
{
    require $controllerFile;

    $controller = new $controllerClass;

    $action = !empty($actionName) // if
        ? lcfirst($actionName)
        : 'index';

    $actionMethod = 'action' . ucfirst($action);

    if (method_exists($controller, $actionMethod))
    {
        // todo here

        $controller->{$actionMethod}();
    }
    else
    {
        http_response_code(404);
        echo "Metoda '$actionMethod' net, brat!";
    }
}
else
{
    http_response_code(404);
    echo 'pizdec';
}
