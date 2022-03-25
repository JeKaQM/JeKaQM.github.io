<?php
    include('connection.php'); 

    $sql = "SELECT Table_Number, Customer_Name, Order_Amount, Payment FROM Tables WHERE Table_Number = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $_GET['q']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($Table_Number, $Customer_name, $Order_Amount, $Payment);
    $stmt->fetch();
    $stmt->close();

    echo "<table>";
    echo "<tr>";
    echo "<th>Table Number:</th>";
    echo "<td>" . $Table_Number . "</td>";
    /*
    echo "<th>| Customer Name:</th>";
    echo "<td>" . $Customer_name . "</td>";
    echo "<th>| Order Amount: £</th>";
    echo "<td>" . $Order_Amount . "</td>";
    echo "<th>| Paid:</th>";
    echo "<td>" . $Payment . "</td>";
    */
    echo "</tr>";
    echo "</table>";
?>