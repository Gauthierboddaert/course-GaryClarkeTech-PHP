<?php

namespace Gauthier\Framework\Routing;

use Gauthier\Framework\Http\Request;
use Gauthier\Framework\Http\Response;

interface RouterInterface
{
    public function dispatch(Request $request): Response;

    public function checkRouteExists(array $router): array;
}