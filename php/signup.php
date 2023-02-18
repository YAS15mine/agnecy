<?php

include "connect.php"; // ====== connect to the database

   $Fname =$_GET["fname"];
   $Lname =$_GET["lname"];
   $Email =$_GET["email"];
   $Phone =$_GET["phone"];
   $Password =$_GET["password"];

//  ===== if the this file heve been called the code above will work
if ( true ){

   // send a request to the db and insert into the values of inputs 
   $sql = "INSERT INTO `client` 
   (`FirstName`, `LastName`, `Email`, `Phone`, `Password`)
   VALUES 
   ('$Fname' , '$Lname', '$Email', '$Phone', '$Password')";


   //retrieve a single row from the result set of the query and store it in the variable "$Result"
   $Result = $conn->query($sql)->fetch();
   
   //redirect the browser to a new URL, which is "index.php"
   header("location:Account.php");
}

