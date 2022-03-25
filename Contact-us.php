<?php
include('connection.php');

session_start();

if($_POST) {
  $name = "";
  $email = "";
  $date = "";
  $people = "";
  $question = "";
  $message = "";
  $captcha = "";

  if(isset($_POST['name'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  }

  if(isset($_POST['email'])) {
    $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  if(isset($_POST['dropdown'])) {
    $question = filter_var($_POST['dropdown'], FILTER_SANITIZE_STRING);
  }

  if(isset($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']);
  }

  if(isset($_POST['booking-date'])) {
    $date = htmlspecialchars($_POST['booking-date']);
  }

  if(isset($_POST['numPeople'])) {
    $people = htmlspecialchars($_POST['numPeople']);
  }

  if($question == "Allergies_And_Calories") {
    $question = "Allergies And Calories";
  }

  if($question == "Cancel_Order") {
    $question = "Cancel Order";
  }

  if($question == "Order_Was_Not_Delivered") {
    $question = "Order Was Not Delivered";
  }

  if($question == "Wrong_Order") {
    $question = "Wrong Order";
  }

  //$contact_array = array($name, $email, $date, $people, $question, $message, $captcha);
  $_SESSION['contact']= array($name, $email, $date, $people, $question, $message, $captcha);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <meta charset="UTF-8">
  <script type="text/javascript" src="captcha.js"></script>
</head>
<body>
  <div class="body contact-us">
    <header>
      <div class="top-menu-container">
        <div class="top-item-container">
          <a class="menu-button" href="index.html"> Home </a>
        </div>
        <div class="top-item-container">
          <a class="menu-button" href="menu.php"> Foods </a>
        </div>
        <div class="top-item-container">
          <a class="menu-button" href="Contact-us.php"> Contact Us </a>
        </div>
      </div>
    </header>
    <div class="container transparent-bg">
      <div class="row-1">
        <p class="text">If we can help with anything or you have any questions, please contact us via this form</p>
      </div>
      <div class="form-container">
        <!--The form uses code from /contact.php-->
        <form name="form" class="contact-form" id="form" method="post" action="/contact.php" enctype="multipart/form-data" onsubmit="validateContactForm()">

          <div class="row-2">
            <div class="column-2-1">
              <p class="label">Name</p>
              <div class="border" id="onclick">
                <input type="text" class="input-field" id="userName" name="userName" placeholder="Brick"/>
              </div>
            </div>
            <div class="column-2-2">
              <p class="label">Email</p>
              <div class="border">
                <input type="text" class="input-field" id="userEmail" name="userEmail" placeholder="example@gmail.com"/>
              </div>
            </div>
          </div>

          <div class="row-1 buttons-container">
            <!--The content shown depends on a choice of user in dropdown dilemma-->
            <!--If booking, then number of people and time is shown. Other classes of dilemma must be hidden-->
            <a id="booking-button" class="button left" onclick="showBooking()">Booking</a>
            <!--If question, then dropdown question is shown. Other classes of dilemma must be hidden-->
            <a id="question-button" class="button right" onclick="showQuestion()">Call Waiter</a>
          </div>

          <!--If user chooses booking, below code should appear-->
          <div id="booking">
            <div class="row-1">
              <p class="label">Booking Date</p>
              <div class="border">
                <input type="date" class="input-field date" id="booking-date" name="booking-date"/>
              </div>
            </div>

            <div class="row-1">
              <p class="label">Number of people</p>
              <div class="border">
                <input type="text" class="input-field" id="numPeople" name="numPeople" placeholder="3"/>
              </div>
            </div>
          </div>

          <!--If user chooses question, below code should appear-->
          <div id="question">
            <div class="row-1">
              <div class="dropdown-question">
                <select class="dropdown" style="margin-top: 5px">
                  <option value="Allergies And Calories" class="dropdown-item">Allergies And Calories</option>
                  <option value="Cancel Order" class="dropdown-item">Cancel Order</option>
                  <option value="Order Was Not Delivered" class="dropdown-item">Order Was Not Delivered</option>
                  <option value="Wrong Order" class="dropdown-item">Wrong Order</option>
                  <option value="Other" class="dropdown-item">Other</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row-1">
            <p class="label">Message</p>
            <div class="border">
              <textarea cols="80" rows="8" class="subject input-field" name="subject" placeholder="Describe the situation in your words"></textarea>
            </div>
            <div id="captcha" class="captcha text">
              <script>createCapt();</script>
            </div>
            <div class="restart">
              <a onclick="createCapt()" class="button submit">Generate New Captcha</a>
            </div>
            <div class="border">
              <input type="text" class="input-field" name="reCaptcha" id="reCaptcha" placeholder="Type The Captcha"/>
            </div>
            <div class="row-1">
              <input type="button" class="button right" value="Submit" onclick="validate()" />
              <div>
                <div id="errCaptcha" class="errmsg"></div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <footer>
      <div class="bot-menu-container">
        <div class="bot-item-container">
          <a class="menu-button" href="login.html"> Sign In </a>
        </div>
        <div class="bot-item-container">
          <a class="menu-button" href="Policy-Page.html"> Privacy Policy </a>
        </div>
      </div>
    </footer>
  </div>
  <script>
    function showBooking() {
      document.getElementById("question").style.display = "none";
      document.getElementById("booking").style.display = "block";
      document.getElementById("booking-button").style.color = "#993d3d";
      document.getElementById("question-button").style.color = "white";
    }
    function showQuestion() {
      document.getElementById("question").style.display = "block";
      document.getElementById("booking").style.display = "none";
      document.getElementById("question-button").style.color = "#993d3d";
      document.getElementById("booking-button").style.color = "white";
    }
  </script>
</body>
</html>
