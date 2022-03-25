<?php
  include('connection.php');
  $sql = "INSERT INTO Menu (`item`, `desc`, `type`, `price`) VALUES (?, ?, ?, ?)";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("ssss", $_GET['item_name'], $_GET['item_desc'], $_GET['item_type'], $_GET['item_price']);
  $stmt->execute();
  $stmt->close();
?>