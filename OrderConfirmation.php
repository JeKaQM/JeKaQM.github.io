<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order Confirmation</title>
  <link rel="stylesheet" type="text/css" href="OrderConfirmation.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="captcha.js"></script>
</head>

<body>
  <div class="body orderconfirmation">
    <header>
      <div class="top-menu-container">
        <div class="top-item-container">
          <a class="menu-button" href="index.html"> Home </a>
        </div>
        <div class="top-item-container">
          <a class="menu-button" href="menu.php"> Foods </a>
        </div>
        <div class="top-item-container">
          <a class="menu-button" href="Contact-us.php"> Contact Us </a>
        </div>
      </div>
    </header>



<div class="container">
  <div class="row-1">
    <h2 class="Thank">Thank you for ordering at Oaxaca!</h2>
  </div>
<br />
<br />
<br />
<br />

  <div class="column-2-1 container-large transparent-bg">
    <h3 class="YourOrderSummary">Your Order Summary:</h3>

    <div class= "ItemsOrdered">
      <h4>Items Ordered:</h4>
      <ul>
        <?php
          session_start();
          $total = 0;
          if(!empty($_SESSION["cart"])){
            foreach ($_SESSION["cart"] as $key => $value) {
        ?>
          <li><?php echo $value["item_name"];?> - £ <?php echo $value["product_price"]; 
            $total = $total + $value["product_price"];} } ?></li>
      </ul>
    </div>
      
   

      <div class="total-amount">
      <h3 class="Total paid">Total Paid:</h3>
      <span class="Amount paid">£<?php echo $total;?></span>
      </div>
    </div>
  </div>


<div class="column-2-2 container-large2">
      <h2 class="YourOrderStatus">Your Order Status:</h2>
      <p>Your food is now being prepared by our kitchen staff and should be ready soon.</p>

  <script>
      //Get it from database
      var countDownDate = new Date("Mar 18, 2022 11:35:00").getTime();

      var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = countDownDate - now;

        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("time").innerHTML = + hours + "h "
        + minutes + "m " + seconds + "s ";

        if (distance < 0) {
          clearInterval(x);
          document.getElementById("time").innerHTML = "EXPIRED";
        }
      }, 1000);
      </script>
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
</div>
</body>
</html>
