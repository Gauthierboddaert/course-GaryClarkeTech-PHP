<?php

use App\Controller\HomeController;
use App\Controller\PostsController;

return [
    [['PUT'], '/', [HomeController::class, 'Index']],
    ['GET', '/post/{id:\d+}', [PostsController::class, 'Show']],
];
