<?php
  include('connection.php');
  $sql = "SELECT item FROM TableOrders WHERE ID = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("s", $_GET['q']);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($result);
  echo "<p>Items:</p>";
  echo "<ul>";
  while ($stmt->fetch()) {
    echo "<li>" . $result . "</li>";
  }
  echo "</ul>";
  $stmt->close();
?>