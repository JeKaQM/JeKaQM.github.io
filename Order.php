<?php
    include('connection.php');
    $sql = "SELECT Table_Number, Customer_Name, Order_Amount, Payment  FROM Tables";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            echo "Table Number: " . $row["Table_Number"]. " |Customer Name: |" . $row["Customer_Name"]. "  |Total Order Amount: |£". $row["Order_Amount"]. "  |Order Paid: |". $row["Payment"]. "<br>";
        }
    } else {
        echo "0 results";
    }
?>