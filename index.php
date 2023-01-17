<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="index.css?v=<?php echo time() ?>" >
  <title>KI36</title>
</head>
<body>
    <?php
    session_start();

    if (isset($_GET['product_id'])) {
      $proid = $_GET['product_id'];
    
      if (!empty($_SESSION['cart'])) {
        $acol = array_column($_SESSION['cart'], 'product_id');
        
        if (in_array($proid, $acol)) {
          $_SESSION['cart'][$proid]['qty'] += 1;
        } else {
          $item = [
            'product_id' => $_GET['product_id'],
            'qty' => 1,
            'price' => $_GET['price']
          ];
    
          $_SESSION['cart'][$proid] = $item;
        }
      } else {
        $item = [
          'product_id' => $_GET['product_id'],
          'qty' => 1,
          'price' => $_GET['price']
        ];
    
        $_SESSION['cart'][$proid] = $item;
      }
    }
    ?>
    
 <?php include 'header.php'; ?>
<div id="wrapper">
  <div class="row1">
  <div class="productcontainer" style='text-align: center;'>
      <div class="card">
        <a href="product1.php"><img src="products/bestek/bestek1.png" alt=front style="width:100%"></a>
          <p>Product</p>
          <p class="price">179.99</p>
          <a href="index.php?product_id=1&price=179.99" class="btn btn-success"><button>Add to Cart</button></a>
      </div>  
      <div class="card">
        <a href="product1.php"><img src="products/clipboard/clipboard1.png" style="width:100%"></a>
          <p>Product</p>
          <p class="price">179.99</p>
          <a href="index.php?product_id=2&price=179.99" class="btn btn-success"><button>Add to Cart</button></a>
      </div> 
      <div class="card">
      <a href="product1.php"><img src="products/fles/fles1.png" style="width:100%"></a>
          <p>Product</p>
          <p class="price">179.99</p>
          <a href="index.php?product_id=3&price=179.99" class="btn btn-success"><button>Add to Cart</button></a>
      </div> 
  </div>
  <div class="row2">
    <div class="productcontainer" style='text-align: center;'>
    <div class="card">
      <a href="product1.php"><img src="products/glasfles/glasfles1.png" style="width:100%"></a>
          <p>Product</p>
          <p class="price">179.99</p>
          <a href="index.php?product_id=5&price=179.99" class="btn btn-success"><button>Add to Cart</button></a>
      </div> 
      <div class="card">
      <a href="product1.php"><img src="products/kalender/kalender1.png" style="width:100%"></a>
          <p>Product</p>
          <p class="price">179.99</p>
          <a href="index.php?product_id=5&price=179.99" class="btn btn-success"><button>Add to Cart</button></a>
      </div> 
      <div class="card">
      <a href="product1.php"><img src="products/massageborstel/massageborstel1.png" style="width:100%"></a>
          <p>Product</p>
          <p class="price">179.99</p>
          <a href="index.php?product_id=6&price=179.99" class="btn btn-success"><button>Add to Cart</button></a>
      </div> 
  </div>


  </div>
</div>

</body>
</html>