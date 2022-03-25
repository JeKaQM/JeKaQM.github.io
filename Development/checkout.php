<?php
  session_start();
  if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
      foreach ($_SESSION["cart"] as $keys => $value){
        if ($value["product_id"] == $_GET["id"]){
          \array_splice($_SESSION["cart"],$keys,1);
          echo '<script>alert("Product has been Removed...!")</script>';
          echo '<script>window.location="checkout.php"</script>';
          break;
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta charset="UTF-8">
  </head>
  <body>
    <div class="body checkout">
      <header>
        <div class="top-menu-container">
          <div class="top-item-container">
            <a class="menu-button" href="index.html"> Home </a>
          </div>
          <div class="top-item-container">
            <a class="menu-button" href="menu.php"> Foods </a>
          </div>
          <div class="top-item-container">
            <a class="menu-button" href="Contact-us.html"> Contact Us </a>
          </div>
        </div>
      </header>
      <div class="container-checkout transparent-bg">
        <div class="row-1">
          <p class="title">Oaxaca</p>
        </div>
 
        <div class="row-1">
          <p class="small-title">Your shopping basket</p>
          <a class="button basket-button" href="PaymentPage.html">Confirm and pay</a>
          <p class="text"> 
            Review of <span class="NumItems"> 
              <?php echo count($_SESSION["cart"]);?>
            </span> 
            items £<span class="PriceItems">
              <?php
                $total = 0;
                if(!empty($_SESSION["cart"])){
                  foreach ($_SESSION["cart"] as $key => $value) {
                    $total = $total + $value["product_price"];
                  }
                }
                echo $total;
              ?>
            </span>
        </div>
 
        <div class="basketContainer">
          <ul style="list-style-type:none;">
            <?php
              if(!empty($_SESSION["cart"])){
                foreach ($_SESSION["cart"] as $key => $value) {
            ?>
            <li><?php echo $value["item_name"]; ?>, £ <?php echo $value["product_price"]; ?>
              <a href="checkout.php?action=delete&id=<?php echo $value["product_id"]; ?>">
                <span class="text-danger">Remove Item</span>
              </a>
            </li>
            <?php } ?>
            <li>Total: £<?php echo number_format($total, 2);?></li>
            <?php } ?>
          </ul>
        </div>
 
      </div>
      <footer>
        <div class="bot-menu-container">
          <div class="bot-item-container">
            <a class="menu-button" href="login.html"> Sign In </a>
          </div>
          <div class="bot-item-container">
            <a class="menu-button" href="Policy-Page.html"> Privacy Policy </a>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>