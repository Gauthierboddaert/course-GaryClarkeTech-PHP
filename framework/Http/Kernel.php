<?php

namespace Gauthier\Framework\Http;


use FastRoute;
use Gauthier\Framework\Routing\RouterInterface;

class Kernel
{

    public function __construct(
        private readonly RouterInterface $router
    )
    {
    }

    public function handle(Request $request): Response
    {
        try{
            $response =$this->router->dispatch($request);
        }catch (\Exception $exception) {
            $response = new Response($exception->getMessage(), 500);
        }

        return $response;
    }

}