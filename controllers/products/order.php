<?php
use Model\Product_model;
loadFile('model/product.model.php');

$productID = $_POST['product-id'];

$productModel = new Product_model();

$placeOrder  = $productModel::placeOrder($productID);

if($placeOrder) {
  redirectURL('/');
}