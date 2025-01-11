<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Products</title>
  <?php echo loadFont(); ?>
  <?php loadStylesheet('list-of-products.css') ?>
  <?php loadStylesheet('main.css') ?>
</head>
<body>
  <main class="center-content list-of-product-content">
    <div class="list-of-products">
       <?php 
        if(!isset($products['message'])) {
          ?>
          <div class="heading-and-action">
            <div>
              <h1>List of Products</h1>
            </div>
            <div>
              <a href="/product/create" class="add-new-product">New Product</a>
            </div>
          </div>
          <?php
        }
       ?>
        <?php if(isset($products['message'])): ?>
          <div class="no-products-found">
            <?php echo $products['message']; ?>
            <div>
              <a href="/product/create" class="empty-add-product-action">Add Product</a>
            </div>
          </div>
        <?php else: ?>
          <div class="product-table">
            <?php loadView('components/table.php', ['products' => $products]); ?>
          </div>
        <?php endif; ?>  
    </div>
  </main>  
</body>
</html>