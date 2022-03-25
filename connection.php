<?php      
    $host = "remotemysql.com";  
    $user = "Ec8oH7E2bo";  
    $password = 'o9xsSDs0W6';  
    $db_name = "Ec8oH7E2bo";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  