<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Admin landing</title>
    <script src="https://kit.fontawesome.com/328ca71b45.js" crossorigin="anonymous"></script>
    <title>Input new menu item</title>
    <link rel="stylesheet" type="text/css" href="admin.css" />
    <meta charset="UTF-8">
</head>
<body>
    <div class="body">
      <header>
        <div class="menu-container">
          <ul class="top-menu">
            <li class="menu-item">
              <a href="index.html"> Home </a>
            </li>
            <li class="menu-item">
              <a href="Admin-landing.html"> Admin-Landing </a>
            </li>
            <li class="menu-item">
              <a href="Admin-Food.html"> Food </a>
            </li>
            <li class="menu-item">
              <a href="Admin-Drinks.html"> Drinks </a>
            </li>
            <li class="menu-item">
              <a href="Admin-messages.php"> Messages </a>
            </li>
            <li class="menu-item">
              <a href="Admin-order.html"> Order Status </a>
          </li>
          </ul>
        </div>
      </header>


    <div class="Ord-container">
    </div>
    <div id="title-text">Current Orders:</div>
    <?php
        include('connection.php');
        $sql = "SELECT Table_Number, Customer_Name, Order_Amount, Payment, items FROM Tables";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<h2></h2>";
                echo "Table number: " . $row["Table_Number"]." | Customer Name: " . $row["Customer_Name"]." | Price £" . $row["Order_Amount"]." | Paid: " . $row["Payment"]. " | Items ordered: " . $row["items"]."<br>";
            }
        } else {
            echo "0 results";
        }
    ?>

</body>

</html>
