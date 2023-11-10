<?php

namespace Gauthier\Framework\Http;

class Response
{
    public function __construct(
        private  ?string $content,
        private  int $statusCode,
        private  array $headers,
    )
    {
    }

    public function send(): ?string {
        return $this->content;
    }


}