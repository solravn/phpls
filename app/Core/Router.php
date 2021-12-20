<?php

namespace App\Core;

class Router
{
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
    public static function invoke()
    {
        $requestUri = $_SERVER['REQUEST_URI'];

        $requestUrl = explode('?', $requestUri)[0] ?? null;
        $uriParts = explode('/', substr($requestUrl, 1));

        $controllerName = $uriParts[0] ?? null;
        $actionName     = $uriParts[1] ?? null;
        $paramVal       = $uriParts[2] ?? null;

        $controllerName  = $controllerName ? lcfirst($controllerName) : 'site';
        $controllerClass = '\App\Controller\\' . ucfirst($controllerName) . 'Controller';

        if (class_exists($controllerClass))
        {
            // new \App\Controller\UserController
            $controller = new $controllerClass;

            $action = !empty($actionName) // if
                ? lcfirst($actionName)
                : 'index';

            $actionMethod = 'action' . ucfirst($action);

            if (method_exists($controller, $actionMethod))
            {
                // todo here

                $controller->{$actionMethod}($paramVal);
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
    }
}
