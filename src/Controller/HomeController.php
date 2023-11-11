<?php

namespace App\Controller;

use Gauthier\Framework\Http\Response;

class HomeController
{
    public function Index(): Response
    {
        return new Response('<h1>Hello World</h1>');
    }
}