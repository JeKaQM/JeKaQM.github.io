<?php
  session_start();
  if(!isset($_SESSION["cart"])){
    $SESSION["cart"];
  }
  if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
      foreach ($_SESSION["cart"] as $keys => $value){
        if ($value["product_id"] == $_GET["id"]){
          \array_splice($_SESSION["cart"],$keys,1);
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
    <div class="body index">
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
          <p class="title">Your shopping basket</p>
        </div>
        <div style="clear: both"></div>
        
        <div class="table-responsive">
          
          <table class="table" style="padding-top: 10px;padding-bottom:10px;">
            <h3 class="title2" style="text-align:center;font-size:25px;font-weight:900;padding-top:1px;">
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
            </h3>
            <tr>
              <th>Product Name</th>
              <th>Price Details</th>
              <th>Remove Item</th>
            </tr>
            <?php
              if(!empty($_SESSION["cart"])){
              $total = 0;
              foreach ($_SESSION["cart"] as $key => $value) {
            ?>
            <tr>
              <td><?php echo $value["item_name"]; ?></td>
              <td>£ <?php echo $value["product_price"]; ?></td>
              <td>
                <a href="checkout.php?action=delete&id=<?php echo $value["product_id"]; ?>">
                  <span class="text-danger">Remove Item</span></a>
              </td>
            </tr>
            <?php
              $total = $total + $value["product_price"];
              }
            ?>
            <tr>
              <td colspan="2" align="right">Total</td>
              <th align="right">£ <?php echo number_format($total, 2); ?></th>
            </tr>
            <?php
            }
            ?>
          </table>
        </div>
        <div class="container">
          <div class="row-1">
            <form action="makeOrder.php" method="get" id="form">
              <label fpr="tableID">Table number please!</label>
              <input type="number" id="tableID" name="ID" min="1" max="5">
            </form>
            <button class="button basket-button" 
              type="submit"
              form="form">
              Pay with Paypal
            </button>
            <div class="card-details">
              <p>Pay using Credit or Debit card</p>
              <div class="card-number">
                <label> Card Number </label>
                <input
                  type="text"
                  class="card-number-field"
                  placeholder="###-###-###"/>
              </div>
              <div class="date-number">
                <label> Expiry Date </label>
                <input 
                  type="text" 
                  class="date-number-field"
                  placeholder="DD-MM-YY" />
              </div>
              <div class="cvv-number">
                <label> CVV number </label>
                <input 
                  type="text" 
                  class="cvv-number-field"
                  placeholder="xxx" />
              </div>
              <div class="nameholder-number">
                <label> Card Holder name </label>
                <input
                  type="text"
                  class="card-name-field"
                  placeholder="Enter your Name"/>
              </div>
              <button class="button basket-button" type="submit" form="form">Submit and Pay</button>
            </div>
          </div>
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