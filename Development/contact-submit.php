<?php
    include('connection.php');

    $name = $_POST['userName'];
    $email = $_POST['userEmail'];
    $reason = $_POST['reason'];
    $message = $_POST['message'];
    $date = trim($_POST['booking-date']);
    $people = trim($_POST['numPeople']);

    if ( $date == "" ){
        $date = NULL;
    }

    if ( $people == "" ){
        $people = 0;
    }
    
    $sql = "INSERT INTO `requests` (`name`, `email`, `reason`, `booking`, `people`, `message`)";
    $sql .= " VALUES ($name, $email, $reason, $date, $people, $message)";

    // prepare and bind
    $statement = $con->prepare("INSERT INTO `requests` (`name`, `email`, `reason`, `booking`, `people`, `message`) VALUES (?, ?, ?, ?, ?, ?)");
    $statement->bind_param("ssssis", $name, $email, $reason, $date, $people, $message);

    $statement->execute();

    //echo "New records created successfully";
    //echo "<br>";
    //echo $statement;

    //$statement->close();
    //$con->close();

    // echo $sql;

    if ($statement) {
        echo "Your Request has been submitted for a review!";

     } else {
        echo "Unable to process your request! Please try again.";

     }

    

?>