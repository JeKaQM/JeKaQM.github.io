<?php
   include('connection.php');
   $sql = "SELECT Drinks, Price FROM Beverages";
   $result = $con->query($sql);
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Drinks: " . $row["Drinks"]. " - Price £" . $row["Price"]. "<br>";
    }
} else {
    echo "0 results";
}
?>