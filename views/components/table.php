<table>
  <thead>
    <tr>
      <th scope="col" class="primary-column">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Status</th>
      <th scope="col">Created</th>
      <th scope="col" class="action-column">Action</th>
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
          <td data-label="Stocks" class="<?php echo $product['stocks'] ? 'in-stocks' : 'out-of-stocks' ?>">
          <?php echo formatStockStatus($product['stocks'])?>
          </td>
          <td data-label="Created"><?php echo formatDate($product['date_created']); ?></td>
          <td data-label="Action" class="table-action">
            <a href="/product/view?id=<?php echo abs($product['id']) ?>" class="action-view">View</a>
            <a href="/product/delete" class="action-edit">Edit</a>
            <form class="action-form-delete" method="POST" action="/product/delete">
              <input type="hidden" name="product-id" value="<?php echo abs($product['id']) ?>"/>
              <input type="hidden" name="_method" value="DELETE"/>
              <button type="submit">Delete</button>
            </form>
          </td>
        </tr>
        <?php
      }
    ?>
  </tbody>
</table>