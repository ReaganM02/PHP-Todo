<?php

namespace Core;

use PDO;

class Database {
  public static function connect() {
    $config = require_once BASE_PATH . 'config.php';
    $dsn = 'mysql:' . http_build_query($config['database'], '', ';');
    $connection = new PDO($dsn, $config['user'],$config['password'], [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    return $connection;
  }

  public static function defaultUserID($userID = 10) {
    return $userID;
  }
}