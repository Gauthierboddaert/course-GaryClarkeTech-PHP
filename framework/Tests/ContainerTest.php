<?php

use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function TestContainerRetrieveValue(): void {
        $container = new Container();
        $container->add('test', 'value');
        $this->assertInstanceOf('myclass', $container->get('test'));
    }
}