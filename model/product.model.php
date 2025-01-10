<?php
namespace Model;

use Core\Database;
use PDO;
class Product_model {
  protected static $connection;
  public static function create($productData) {
    $connect = Database::connect();
    $statement = $connect->prepare('INSERT INTO products(title, description, stocks, quantity) VALUES(:title, :description, :stocks, :quantity)');
    $statement->bindValue(':title', $productData['title'], PDO::PARAM_STR);
    $statement->bindValue(':description', $productData['description'], PDO::PARAM_STR);
    $statement->bindValue(':stocks', $productData['stocks'], PDO::PARAM_STR);
    $statement->bindValue(':quantity', $productData['quantity'], PDO::PARAM_INT);
    if($statement->execute()) {
      return true;
    }else {
      return false;
    }
  }
}