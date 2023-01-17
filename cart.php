<?php session_start(); ?>

<?php include 'header.php'; ?>
  <?php
      if (isset($_SESSION['cart'])) {
        $i = 1;
        ?>
<div class= cartcontainer>
  <table class="styled-table">
  <thead>
      <tr class="text-center">
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Action</th>
        <th>Price</th>
        <th>Remove</th>
      </tr>
  </thead>
  <tbody>
    <?php
        foreach ($_SESSION['cart'] as $cart) {  
  ?>
    <tr class="text-center">
      <td> Product <?= $cart['product_id']; ?></td>
      <td>
        <form action="update.php" method="post">
        <input type="hidden" value="<?= $cart['qty']; ?>" name="qty">
        <input type="hidden" name="upid" value="<?= $cart['product_id']; ?>">
        <?= $cart['qty']; ?>
      </td>
      <td>
        <input type="submit" name="increment" value="+">
        <input type="submit" name="decrement" value="-">
        </form>
      </td>
      <td><a class="btn btn-sm btn-danger">€<?= number_format(($cart["price"] * $cart['qty']), 2, ',', '.'); ?></a></td>
      <td><a class="btn btn-sm btn-danger" href="removecartitem.php?id=<?= $cart['product_id']; ?>">Remove</a></td>
    </tr>
    <?php
      $i++;
      }
    ?>
  </tbody>
  </table>
  <div class="cartbuttons">
<button onclick="location.href='emptycart.php'"><click>Empty Cart</click></button>  
<?php
    $cartTotal = 0;
    foreach ($_SESSION['cart'] as $cart) {
      $cartTotal += $cart["price"] * $cart['qty'];
    }
?>
<button onclick="location.href='checkout.php'"><click>Checkout | €<?php echo number_format($cartTotal, 2, ',', '.') ?></click></button>  

</div>
  </div>
  <?php
      } else {
  include 'emptycartpage.php';
  }
  ?>
</div>
</div>
<?php include 'footer.php'; ?>