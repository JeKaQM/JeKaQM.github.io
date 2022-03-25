<?php
    include('connection.php'); 

    $sql = "DELETE FROM 'TableOrders' WHERE ID= ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $_GET['q']);
    $stmt->execute();
    $stmt->close();
?>