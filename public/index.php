<?php 

use Core\Router;
const BASE_PATH =  __DIR__ . '/../';
require_once BASE_PATH . 'core/functions.php';

spl_autoload_register(function($class) {
  loadFile("{$class}.php");
});

$router = new Router();
loadFile('routes.php',  ['router' => $router]);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);