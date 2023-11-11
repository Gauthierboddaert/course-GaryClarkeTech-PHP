<?php

namespace Gauthier\Framework\Routing;

use Gauthier\Framework\Http\Request;
use Gauthier\Framework\Http\Response;
use FastRoute;

class Router implements RouterInterface
{
    public function dispatch(Request $request): Response
    {
        $dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $routeCollector) {
            $routes = include ROOT_DIR . '/Routes/Web.php';

            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });


        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo(),
        );

        [$status,[$controller, $method], $vars] = $routeInfo;

        return call_user_func_array([new $controller(), $method], $vars);
    }
}