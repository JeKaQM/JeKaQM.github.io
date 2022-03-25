<?php
  include('connection.php');
  $sql = "INSERT INTO TableOrders (?, ?)";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("ss", $_GET['ID'], $GET['item']);
  $stmt->execute();
  $stmt->close();
?>