<?php

namespace Core;

class Router {
  protected $routes = [];
  public function add($uri, $controller, $method) {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method
    ];
  }

  public function get($uri, $controller) {
    $this->add($uri, $controller, 'GET');
  }

  public function post($uri, $controller) {
    $this->add($uri, $controller, 'POST');
  }

  public function delete($uri, $controller) {
    $this->add($uri, $controller, 'DELETE');
  }

  public function patch($uri, $controller) {
    $this->add($uri, $controller, 'PATCH');
  }  

  public function route($uri, $method) {
    foreach($this->routes as $route) {
      if($route['uri'] === $uri && $method === $route['method']) {
        loadController($route['controller']);
        die();
      }
    }
    $this->pageNotFound();
  }

  public function pageNotFound() {
    http_response_code(404);
    loadView('404.php');
    die();
  }

}