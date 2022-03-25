<?php
  session_start();
  include('connection.php');
  if (isset($_POST["add"])){
    for ($x = 0; $x < $_POST["quantity"]; $x++){
      
      if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"product_id");
        $count = count($_SESSION["cart"]);
        $item_array = array(
          'product_id' => $_GET["id"],
          'item_name' => $_POST["hidden_name"],
          'product_price' => $_POST["hidden_price"],
          );
          $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="Menu.php"</script>';
      }else{
        $item_array = array(
          'product_id' => $_GET["id"],
          'item_name' => $_POST["hidden_name"],
          'product_price' => $_POST["hidden_price"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
  }
}

if (isset($_GET["action"])){
  if ($_GET["action"] == "delete"){
    foreach ($_SESSION["cart"] as $keys => $value){
      if ($value["product_id"] == $_GET["id"]){
        \array_splice($_SESSION["cart"],$keys,1);
        echo '<script>window.location="Menu.php"</script>';
        break;
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div class="body index">
    <header>
      <div class="top-menu-container">
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
          <div class="top-item-container">
            <a class="special-menu-button" href="checkout.php"> Checkout</a>
          </div>
        </div>
      </div>
    </header>
    <div class="container transparent-bg">
    <?php
      $query = "SELECT * FROM Menu ORDER BY item_ID ASC ";
      $result = mysqli_query($con,$query);
      if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
    ?>
    <div class="col-md-3">
      <form method="post" action="Menu.php?action=add&id=<?php echo $row["item_ID"]; ?>">
        <div class="dish-item">
          <img src="<?php echo $row["picture"]; ?>" class="img-responsive">
          <h5 class="dish-title"><?php echo $row["item"]; ?></h5>
          <h5 class="dish-description"><?php echo $row["desc"]; ?></h5>
          <h5 class="dish-type"><?php echo $row["type"]; ?></h5>
          <h5 class="dish-type"><?php echo $row["Order_Time"]; ?></h5>
          <h5 class="dish-price"><?php echo '£'.$row["price"]; ?></h5>
          <input type="text" name="quantity" class="form-control" value="1">
          <input type="hidden" name="hidden_name" value="<?php echo $row["item"]; ?>">
          <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
          <input type="submit" name="add" class="btn btn-success" value="ADD TO THE CART">
        </div>
      </form>
    </div>
    <?php
      }
    }
    ?>
    <div style="clear: both"></div>
    <h3 class="title2" style="text-align:center;font-size:25px;font-weight:900;padding-top:20px;">Shopping Cart Details</h3>
    <div class="table-responsive">
      <table class="table table-bordered">
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
            <a href="Menu.php?action=delete&id=<?php echo $value["product_id"]; ?>">
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
