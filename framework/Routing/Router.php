<?php

namespace Gauthier\Framework\Routing;

use Gauthier\Framework\Http\Exception\HttpMethodNotFound;
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

        [$status,[$controller, $method], $vars] = $this->checkRouteExists($routeInfo);

        return call_user_func_array([new $controller(), $method], $vars);
    }

    public function checkRouteExists(array $router): array
    {
        switch ($router[0]) {
            case FastRoute\Dispatcher::FOUND:
                return $router;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $methodAllowed = implode(', ',$router[1]);
                throw new HttpMethodNotFound("Method(s) allowed: $methodAllowed", 405);
            default:
                throw new \Exception('Route not found', 404);
        }
    }
}