<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Products</title>
  <?php echo loadFont(); ?>
  <?php loadStylesheet('main.css') ?>
  <?php loadStylesheet('show.css') ?>
</head>
<body>
  <main class="center-content list-of-product-content">
    <div class="list-of-products">
     <?php if(isset($product['message'])): ?>
      <div class="product-not-found">
        <h1>Product ID Not found!</h1>
        <a href="/" class="go-back">Go Back</a>
      </div>
     <?php else: ?> 
     <div class="single-product-wrapper">
       <div class="placeholder-img">
        <img src="/assets/images/placeholder-img.webp"/>
       </div>
       <div class="content-wrapper">
         <div>
          <a href="/" class="single-product-go-back">
            Go Back
          </a>
         </div>
         <h1 class="single-product-title"><?php echo clean($product['title']) ?></h1>
         <div class="single-product-description"><?php echo clean($product['description']); ?> </div>
         <div class="single-product-price"><?php echo formatPrice($product['price']); ?> </div>
         <div class="single-product-quantity">Remaining stocks: <?php echo clean($product['quantity']); ?> </div>
         <form class="place-order-form">
          <button type="submit">Place an Order</button>
         </form>
       </div>
     </div>
     <?php endif; ?>
    </div>
  </main>  
</body>
</html>