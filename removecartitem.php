<?php
session_start();
if (isset($_GET['id'])) {
  $proid = $_GET['id'];
  unset($_SESSION['cart'][$proid]);
  header("location: cart.php");
};?>

<?php
if (count($_SESSION['cart']) == 0) {
  session_start();
  unset($_SESSION['cart']);
  header("location: cart.php");
};?>