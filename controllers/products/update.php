<?php

use Core\Validator;
use Model\Product_model;

loadFile('model/product.model.php');


$productID = $_POST['product-id'];
$title = $_POST['product-title'];
$price = $_POST['product-price'];
$status = $_POST['product-status'];
$quantity =$_POST['product-quantity'];
$description = $_POST['product-description'];
$stocks = $_POST['product-status'];

$errors = [];

if(!Validator::required($title)) {
  $errors['title'] = 'Title is required';
}

if(!Validator::required($price)) {
  $errors['price'] = 'Price is required.';
}

if(!Validator::required($quantity)) {
  $errors['quantity'] = 'Quantity is required.';
}

if(!Validator::required($description)) {
  $errors['description'] = 'Description is required.';
}

if(!(int) $_POST['product-quantity'] >= 1) {
  $errors['quantity'] = 'Quantity must be a number greater than 1.';
}


$sanitizedData = [
  'title' => $title, 
  'description' => strip_tags($description), 
  'quantity' => intval($quantity), 
  'stocks' => strip_tags($stocks), 
  'price' => floatval( $price)
];

if(!empty($errors)) {
 loadView('products/edit.view.php', ['errors' => $errors, 'product' => $sanitizedData]);
 die();
} else {
  $update =  Product_model::findByIdAndUpdate($productID,$sanitizedData);
  if($update) {
    redirectURL('/');
  }
}

