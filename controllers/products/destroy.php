<?php

use Model\Product_model;
loadFile('model/product.model.php');

if(!isset($_POST['_method']) && $_POST['method'] !== 'DELETE') {
  redirectURL('/');
}

$productID = (int)$_POST['product-id'];

if(!is_int($productID) || $productID === 0) {
  redirectURL('/');
}

$deleteProduct = Product_model::deleteProductByID($productID);

if($deleteProduct) {
  redirectURL('/');
}
echo 'Failed to delete';