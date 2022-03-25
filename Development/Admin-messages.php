<!DOCTYPE html>
<html lang="en">

<head>
  <title>Messages</title>
  <link rel="stylesheet" type="text/css" href="admin.css" />
  <meta charset="UTF-8">

  <style type="text/css">
  .tg {
    border-collapse: collapse;
    border-color: #93a1a1;
    border-spacing: 0;
    width: 100%;
    margin: 20px 0px;
  }
  .tg td {
    background-color: #fdf6e3;
    border-color: #93a1a1;
    border-style: solid;
    border-width: 1px;
    color: #002b36;
    font-family: Arial, sans-serif;
    font-size: 14px;
    overflow: hidden;
    word-break: normal;
  }
  .tg th {
    background-color: #657b83;
    border-color: #93a1a1;
    border-style: solid;
    border-width: 1px;
    color: #fdf6e3;
    font-family: Arial, sans-serif;
    font-size: 14px;
    font-weight: normal;
    overflow: hidden;
    word-break: normal;
  }

  .requests{
    display: block;
    float: left;
    position: relative;
    width: 80%;
  }

  .message-heading{
    display: block;
    float: left;
    position: relative;
    font-family: Arial, sans-serif;
    text-align: center;
    width: 100%;
  }
  </style>

</head>

<body>
  <div class="body">
    <header>
      <div class="menu-container">
        <ul class="top-menu">
          <li class="menu-item">
            <a href="index.html"> Home </a>
          </li>
          <li class="menu-item">
            <a href="Admin-landing.html"> Admin-Landing </a>
          </li>
          <li class="menu-item">
            <a href="Admin-Food.html"> Food </a>
          </li>
          <li class="menu-item">
            <a href="Admin-Drinks.html"> Drinks </a>
          </li>
          <li class="menu-item">
            <a href="Admin-messages.php"> Messages </a>
          </li>
          <li class="menu-item">
            <a href="Admin-order.html"> Order Status </a>
        </li>
        </ul>
      </div>
    </header>

    <div class="requests">
      <h2 class="message-heading">Messages</h2>

    <?php
        include('connection.php');
        $sql = "SELECT * FROM `requests` ORDER BY `requests`.`timestamp` DESC";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {


              echo "<table class='tg'>";

                echo "<thead>";
                  echo "<tr>";
                    echo "<th>" . $row["name"] . "</th>";
                    echo "<th>" . $row["email"] . "</th>";
                    echo "<th>" . $row["reason"] . "</th>";
                  echo "</tr>";
                echo "</thead>";

                echo "<tbody>";
                  echo "<tr><td colspan='3'>" . $row["message"] . "</td></tr>";
                echo "</tbody>";
              
                echo "</table>";

            }
        } else {
            echo "0 results";
        }
    ?>

</div>


</body>

</html>

