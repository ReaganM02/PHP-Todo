<?php
function loadFile($path, $data = []) {
  extract($data);
  require_once BASE_PATH . $path;
}

function prettyArray($array) {
  echo '<pre>';
    print_r($array);
  echo '</pre>';
  die();
}

function loadController($controllerPath) {
  require_once BASE_PATH . 'controllers/' . $controllerPath;
}

function loadView($viewPath) {
  require_once BASE_PATH . 'views/' . $viewPath;
}