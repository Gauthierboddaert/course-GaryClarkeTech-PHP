<?php

namespace App\Controller;
use Gauthier\Framework\Http\Response;

class PostsController
{
    public function Show(int $id): Response
    {
        return new Response('<h1>Post ' . $id . '</h1>');
    }
}