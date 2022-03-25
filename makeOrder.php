<?php
  session_start();
  include('connection.php');
  $sql = "INSERT INTO TableOrders VALUES (?, ?)"; 
  foreach ($_SESSION["cart"] as $keys => $value){
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $_GET['ID'], $value["item_name"]);
    $stmt->execute();
    $stmt->close();
  }
  echo '<script>window.location="orderConfirmation.php"</script>'
?>