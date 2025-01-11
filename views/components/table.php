<table>
  <thead>
    <tr>
      <th scope="col" class="primary-column">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Status</th>
      <th scope="col">Created</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      foreach($products as $product) {
        ?>
        <tr>
          <td data-label="Title"><?php echo $product['title']; ?></td>
          <td data-label="Price"><?php echo formatPrice(abs($product['price'] ));?></td>
          <td data-label="Quantity"><?php echo abs($product['quantity'] );?></td>
          <td data-label="Stocks"><?php echo $product['stocks'] === 'in-stock' ? 'In stocks' : 'Out of stocks';?></td>
          <td data-label="Created"><?php echo formatDate($product['date_created']); ?></td>
          <td data-label="Action" class="table-action">
            <a href="/product/view" class="action-view">View</a>
            <a href="/product/delete" class="action-delete">Delete</a>
          </td>
        </tr>
        <?php
      }
    ?>
  </tbody>
</table>