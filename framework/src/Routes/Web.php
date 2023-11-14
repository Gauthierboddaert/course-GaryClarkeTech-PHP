<?php

use App\Controller\HomeController;
use App\Controller\PostsController;

return [
    [['PUT', 'GET'], '/', [HomeController::class, 'Index']],
    ['GET', '/post/{id:\d+}', [PostsController::class, 'Show']],
];
