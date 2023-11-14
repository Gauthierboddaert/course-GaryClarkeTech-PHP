<?php

use PHPUnit\Framework\TestCase;
use Gauthier\Framework\Container\Container;
use Gauthier\Framework\Container\DependantClass;
use Gauthier\Framework\Container\Exception\ContainerException;
class ContainerTest extends TestCase
{
    public function testContainerRetrieveValue(): void {

        $container = new Container();
        $container->add('dependant-class', DependantClass::class);
        $this->assertEquals(DependantClass::class, $container->get('dependant-class'));

    }

    public function testContainerCantRetrieveValue(): void {
        $container = new Container();
        $this->expectException(ContainerException::class);
        $container->add('dependant-class');
    }

    public function testContainerHasService(): void {
        $container = new Container();
        $container->add('dependant-class', DependantClass::class);
        $hasService = $container->has('dependant-class');
        $this->assertTrue($hasService);
    }

    public function testContainerHasntService(): void {
        $container = new Container();
        $hasService = $container->has('dependant-class');
        $this->assertFalse($hasService);
    }
}