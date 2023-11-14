<?php

namespace Gauthier\Framework\Http;


use Gauthier\Framework\Http\Exception\HttpMethodNotFound;
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
            $response = $this->router->dispatch($request);
        }catch (HttpMethodNotFound $exception) {
            $response = new Response($exception->getMessage(), 405);
        }catch (\Exception $exception) {
            $response = new Response($exception->getMessage(), 404);
        }

        return $response;
    }

}