<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create a product listing</title>
  <?php echo loadFont(); ?>
</head>
<body>
  <main class="center-content">
   <div class="content-wrapper">
    <h1 class="heading-one">Add Product Listing</h1>
      <form method="POST" action="/product/create">
        <?php 
          inputField([
            'type' => 'text',
            'name' => 'product-title',
            'label' => 'Product Title',
            'error' => $errors['title'] ?? null  
          ]);
          inputField([
            'type' => 'text',
            'name' => 'product-price',
            'label' => 'Price',
            'error' => $errors['price'] ?? null 
          ]);
          inputField([
            'type' => 'text',
            'name' => 'product-quantity',
            'label' => 'Quantity',
            'error' => $errors['quantity'] ?? null,
            'value' => $valueData['quantity']
          ]);
          inputField([
            'type' => 'select',
            'name' => 'product-status',
            'label' => 'Status',
            'options' => [
              'in-stock' => 'In stock',
              'out-of-stock' => 'Out of stocks'
            ],
            ]);
          inputField([
            'type' => 'textarea',
            'name' => 'product-description',
            'label' => 'Description',
            'error' => $errors['description'] ?? null
          ])
        ?>
        <button type="submit" class="add-product-btn">Add Product</button>
      </form>
   </div>
  </main>
</body>
</html>