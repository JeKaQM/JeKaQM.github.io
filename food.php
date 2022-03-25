<?php
    include('connection.php');
    $sql = "SELECT Burgers, Price FROM Food";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Burgers: " . $row["Burgers"]. " - Price £" . $row["Price"]. "<br>";
        }
    } else {
        echo "0 results";
    }
?>