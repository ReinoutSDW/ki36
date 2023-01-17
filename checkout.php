<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="checkout.css?v=<?php echo time() ?>" >

</head>

<?php 
    include 'header.php'; 
?>

<body>
<?php
    session_start();
    if (isset($_SESSION['cart'])) {
        ?>
    
<div class="checkoutform">
<div class="row">
    <div class="container">
      <div class="header"><b>Checkout</b></div>
        <form action="/action_page.php">
            <div class="col-50">
              <input type="text" id="fname" name="firstname" placeholder="Full Name">
              <input type="text" id="email" name="email" placeholder="Email">
              <input type="text" id="adr" name="address" placeholder="Address">
              <input type="text" id="city" name="city" placeholder="City">
              <input type="text" id="state" name="state" placeholder="State">
              <input type="text" id="zip" name="zip" placeholder="Zip">
              <select id="country" name="country" placeholder="Country"> 
                    <option value="" disabled selected hidden>Country</option>
                              <option value="NL">Netherlands</option>
                              <option value="AL">Albania</option>
                              <option value="AD">Andorra</option>
                              <option value="AT">Austria</option>
                              <option value="BY">Belarus</option>
                              <option value="BE">Belgium</option>
                              <option value="BA">Bosnia and Herzegovina</option>
                              <option value="BG">Bulgaria</option>
                              <option value="HR">Croatia (Hrvatska)</option>
                              <option value="CY">Cyprus</option>
                              <option value="CZ">Czech Republic</option>
                              <option value="FR">France</option>
                              <option value="GI">Gibraltar</option>
                              <option value="DE">Germany</option>
                              <option value="GR">Greece</option>
                              <option value="VA">Holy See (Vatican City State)</option>
                              <option value="HU">Hungary</option>
                              <option value="IT">Italy</option>
                              <option value="LI">Liechtenstein</option>
                              <option value="LU">Luxembourg</option>
                              <option value="MK">Macedonia</option>
                              <option value="MT">Malta</option>
                              <option value="MD">Moldova</option>
                              <option value="MC">Monaco</option>
                              <option value="ME">Montenegro</option>
                              <option value="NL">Netherlands</option>
                              <option value="PL">Poland</option>
                              <option value="PT">Portugal</option>
                              <option value="RO">Romania</option>
                              <option value="SM">San Marino</option>
                              <option value="RS">Serbia</option>
                              <option value="SK">Slovakia</option>
                              <option value="SI">Slovenia</option>
                              <option value="ES">Spain</option>
                              <option value="UA">Ukraine</option>
                              <option value="UK">United Kingdom</option>
                              <option value="DK">Denmark</option>
                              <option value="EE">Estonia</option>
                              <option value="FO">Faroe Islands</option>
                              <option value="FI">Finland</option>
                              <option value="GL">Greenland</option>
                              <option value="IS">Iceland</option>
                              <option value="IE">Ireland</option>
                              <option value="LV">Latvia</option>
                              <option value="LT">Lithuania</option>
                              <option value="NO">Norway</option>
                              <option value="SJ">Svalbard and Jan Mayen Islands</option>
                              <option value="SE">Sweden</option>
                              <option value="CH">Switzerland</option>
                              <option value="TR">Turkey</option>
                  </select>
            </div>
              <div class="col-button"><input type="submit" value="Continue to checkout" class="checkoutbutton"></div>
      </div>  
      </form>

<div class="col-25">   
<div class= carttotalcontainer>
  <table class="styled-table">
  <thead>
      <tr class="text-center">
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
  </thead>
  <tbody>
    <?php
        foreach ($_SESSION['cart'] as $cart) {  
  ?>
    <tr class="text-center">
      <td> Product <?= $cart['product_id']; ?></td>
      <td><?=$cart['qty']; ?></a></td>
      </td>
      <td>€<?= number_format(($cart["price"] * $cart['qty']), 2, ',', '.'); ?></a></td>
    </tr>
    <?php
      }
    ?>
    <?php
    $cartTotal = 0;
    foreach ($_SESSION['cart'] as $cart) {
      $cartTotal += $cart["price"] * $cart['qty'];
    }
    ?>
      <tr class="text-bottom">
        <td>Total:</td>
        <td></td>
        <td>€<?php echo number_format($cartTotal, 2, ',', '.') ?></td>
      </tr>
  </tbody>
  </table>
</div>
</div>
</div>
</div>

<?php
      } else {
  include 'emptycartpage.php';
  }
  ?>
</body>
</html>
