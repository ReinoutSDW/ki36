<?php
session_start();

if ($_POST['increment']) {

  $upid = $_POST['upid'];

  $acol = array_column($_SESSION['cart'], 'product_id');

  if (in_array($_POST['upid'], $acol)) {
    $_SESSION['cart'][$upid]['qty'] = $_POST['qty'] + 1;
  } else {
    $item = [
      'product_id' => $upid,
      'qty' => 1
    ];
    $_SESSION['cart'][$upid] = $item;
  }

  header("location: cart.php");
}

if ($_POST['decrement']) {
  $upid = $_POST['upid'];

  $acol = array_column($_SESSION['cart'], 'product_id');
  if (in_array($_POST['upid'], $acol)) {
    if ($_SESSION['cart'][$upid]['qty'] != 1) {
      $_SESSION['cart'][$upid]['qty'] = $_POST['qty'] - 1;
    }
    else {
      unset($_SESSION['cart'][$upid]);
      header("location: cart.php");
    }
  } else {
    $item = [
      'product_id' => $upid,
      'qty' => 1
    ];
    $_SESSION['cart'][$upid] = $item;
  }

  header("location: cart.php");
}

if (count($_SESSION['cart']) == 0) {
  session_start();
  unset($_SESSION['cart']);
  header("location: cart.php");
};?>