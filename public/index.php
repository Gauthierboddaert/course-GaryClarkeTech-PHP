<?php declare(strict_types=1);

use Gauthier\Framework\Http\Request;
use Gauthier\Framework\Routing\Router;
use Gauthier\Framework\Http\Kernel;
define('ROOT_DIR', dirname(__DIR__).'/Framework/src');

require_once dirname(__DIR__) . '/vendor/autoload.php';

$request = Request::createFromGlobal();

$router = new Router();
$kernel = new Kernel($router);

$response = $kernel->handle($request);

echo $response->send();

