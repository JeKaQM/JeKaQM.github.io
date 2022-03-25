//Useless
<?php
  include('connection.php');

  function addItemBask($item){
    $sql = "INSERT 
            FROM Basket 
            VALUES (" + $item + ")";
    $con->query($sql);
  }
  function removeItem($item){
    $sql = "DELETE 
            FROM Basket 
            Where name="+$item;
    $con->query($sql); 
  }
?>