<?php
$router->get('/', 'products/index.php');
$router->get('/product/create', 'products/create.php');
$router->post('/product/create', 'products/store.php');