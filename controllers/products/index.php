<?php

use Model\Product_model;
loadFile('model/product.model.php');

$products = Product_model::getProducts();
loadView('products/index.view.php', ['products' => $products]);