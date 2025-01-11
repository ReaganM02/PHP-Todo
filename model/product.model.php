<?php
namespace Model;

use Core\Database;
use PDO;
class Product_model {
  protected static $connection;
  public static function create($productData) {
    $connect = Database::connect();
    $statement = $connect->prepare('INSERT INTO products(title, description, stocks, quantity, price, userID) VALUES(:title, :description, :stocks, :quantity, :price, :userID)');
    $statement->bindValue(':title', $productData['title'], PDO::PARAM_STR);
    $statement->bindValue(':description', $productData['description'], PDO::PARAM_STR);
    $statement->bindValue(':stocks', $productData['stocks'], PDO::PARAM_INT);
    $statement->bindValue(':quantity', $productData['quantity'], PDO::PARAM_INT);
    $statement->bindValue(':price', $productData['price'], PDO::PARAM_STR);
    $statement->bindValue(':userID', Database::defaultUserID());
    if($statement->execute()) {
      return true;
    }else {
      return false;
    }
  }

  public static function getProducts() {
    $connect = Database::connect();
    $statement = $connect->prepare('SELECT * FROM products ORDER BY date_created DESC');
    $statement->execute();
    $result = $statement->fetchAll();
    if(empty($result)) {
      return[
        'message' => 'No products found. Add some!'
      ];
    }
    return $result;
  }

  public static function getProductByID($productID) {
    $connect = Database::connect();
    $statement = $connect->prepare('SELECT * FROM products WHERE id = :id AND userID = :userID');
    $statement->bindValue(':id', $productID, PDO::PARAM_INT);
    $statement->bindValue(':userID', Database::defaultUserID());
    $statement->execute();

    $result = $statement->fetch();
    if(!$result) {
      return [
        'message' => 'No product found.'
      ];
    }
    return $result;
  }

  public static function deleteProductByID($productID) {
    $connect = Database::connect();
    $statement = $connect->prepare('DELETE FROM products WHERE id = :id AND userID = :userID');
    $statement->bindValue(':id', $productID, PDO::PARAM_INT);
    $statement->bindValue(':userID', Database::defaultUserID());

    $statement->execute();

    if($statement->rowCount() > 0) {
      return true;
    }
    return false;
  }
}