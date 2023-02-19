<?php
  // Start a session to store user information
  session_start();
  // include ("connect.php");
  $error = ""; 

  //Connect to the MySQL database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Homes_Agency";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check for errors connecting to the database
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the email and password submitted from the login form
  $email = $_POST['Email'];
  $password = $_POST['Password'];

  // Query the database for a user with the submitted email and password
  $sql = "SELECT * FROM `Client` WHERE `Email`='$email' AND `password`='$password'";
  $result = $conn->query($sql);

  // Check if the query returned a result
  if ($result->num_rows > 0) {
    // Login successful, set session variables and redirect to home page
    $row = $result->fetch_assoc();
    $_SESSION['user_email'] = $row['Email'];
    header("Location: index.php");
  } else {
    // Login failed, redirect back to login page with error message
      $error = "Email or Password is invalid";
      header("location: Account.php?error=$error"); 

  }
