<?php 

use Model\Product_model;
loadFile('model/product.model.php');

if(!isset($_GET['id'])) {
  redirectURL('/');
}

$postID = (int)$_GET['id'];

if(!is_int($postID) || $postID === 0) {
  redirectURL('/');
}

$product = Product_model::getProductByID($postID);

loadView('products/edit.view.php', ['product' => $product]);