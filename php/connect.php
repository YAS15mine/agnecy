<?php

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "homes_agency";

// create a new PDO instance that represents a connection to a database.
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage(); //if there is an error display it
}
