<?php      
    include('connection.php');  
    include('login.js');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  

        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){  
            header("Location: Admin-landing.html");  
        }  
        else{
            echo "Login failed!";
            header("Location: login.html");  
        }     
?>  