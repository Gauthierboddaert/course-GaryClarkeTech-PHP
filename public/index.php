<?php declare(strict_types=1);

use \Gauthier\Framework\Http\Request;
use \Gauthier\Framework\Http\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$request = Request::createFromGlobal();

$kernel = new Kernel();
$response = $kernel->handle($request)->send();

