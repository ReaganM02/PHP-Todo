<?php
$router->get('/', 'products/index.php');
$router->get('/product/view', 'products/show.php');

$router->get('/product/create', 'products/create.php');
$router->post('/product/create', 'products/store.php');
$router->delete('/product/delete', 'products/destroy.php');
$router->get('/product/edit', 'products/edit.php');
$router->patch('/product/update', 'products/update.php');
$router->post('/product/place-order', 'products/order.php');