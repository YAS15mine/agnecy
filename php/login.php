<?php
session_start();

include "connect.php";

// Get the Email and Password from the login form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  echo $Email;
  echo $Password;

  // Prepare the SQL statement
  $sql = "SELECT * FROM `client` WHERE `Email` ='$Email' AND `Password` = '$Password'";

  //Execute the SQL statement
  // $result = $conn->query($sql);
  $result = $conn->query($sql)->fetch();

  // Check if the query was successful
  if ($result->num_rows == 1) {
    // User is authenticated, set session variables and redirect to home page
    $_SESSION['Email'] = $Email;
    header('Location: index.php');
    exit();
  } else {
    // User is not authenticated, show error message
    echo "Invalid Email or Password.";
  }
}