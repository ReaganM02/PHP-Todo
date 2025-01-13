<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editing <?php echo clean($product['title']); ?> Product</title>
  <?php echo loadFont(); ?>
  <?php echo loadStylesheet('main.css'); ?>
  <?php echo loadStylesheet('create.css'); ?>
</head>
<body>
  <main class="center-content">
   <div class="content-wrapper">
    <h1 class="heading-one"> Editing <?php echo clean($product['title']) ?> Product</h1>
      <form method="POST" action="/product/update">
        <input type="hidden" name="_method" value="PATCH"/>
        <input type="hidden" name="product-id" value="<?php echo clean(abs($product['id'])) ?>"/>
        <?php 
          inputField([
            'type' => 'text',
            'name' => 'product-title',
            'label' => 'Product Title',
            'error' => $errors['title'] ?? null,
            'value' => clean($product['title'])
          ]);
          inputField([
            'type' => 'text',
            'name' => 'product-price',
            'label' => 'Price',
            'error' => $errors['price'] ?? null,
            'value' => clean($product['price'])
          ]);
          inputField([
            'type' => 'text',
            'name' => 'product-quantity',
            'label' => 'Quantity',
            'error' => $errors['quantity'] ?? null,
            'value' => clean($product['quantity'])
          ]);
          inputField([
            'type' => 'select',
            'name' => 'product-status',
            'label' => 'Status',
            'options' => [
              '1' => 'In stock',
              '0' => 'Out of stocks'
            ],
            'selected' => $product['stocks']
            ]);
          inputField([
            'type' => 'textarea',
            'name' => 'product-description',
            'label' => 'Description',
            'error' => $errors['description'] ?? null,
            'value' => clean($product['description'])
          ])
        ?>
        <div class="form-actions">
          <a type="submit" class="go-back-to-home" href="/">Cancel</a>
          <div class="form-button-actions">
            <button type="submit" class="add-product-btn">Update Product</button>
          </div>
        </div>
      </form>
   </div>
  </main>
</body>
</html>