<?php declare(strict_types=1);

use \Gauthier\Framework\Http\Request;
use \Gauthier\Framework\Http\Kernel;
use Gauthier\Framework\Routing\Router;

define('ROOT_DIR', dirname(__DIR__).'/framework');

require_once dirname(__DIR__) . '/vendor/autoload.php';

$request = Request::createFromGlobal();

$router = new Router();
$kernel = new Kernel($router);

$response = $kernel->handle($request);

echo $response->send();

