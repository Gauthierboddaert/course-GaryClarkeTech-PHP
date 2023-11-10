<?php

namespace Gauthier\Framework\Http;

class Kernel
{
    public function __construct()
    {
    }

    public function handle(Request $request): Response
    {
        return new Response(content: '<h1>Hello</h1>', statusCode: 200, headers: ['Content-Type' => 'text/plain']);
    }
}