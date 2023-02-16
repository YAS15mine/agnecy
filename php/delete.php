<?php 

require "connect.php";// call the  connect file that connects tothe db

if (isset($_GET['id']) ){// if the button is set in th form wxecute the cod bellow

    
    $ID = $_GET['id'];
    

    //store a request to the db to delete the card by its id
    $Delete = "DELETE FROM announce WHERE `announce`.`ID` = $ID" ;
    
    //execute the request above
    $Result = $conn->query($Delete)->execute();

    // if result had an error print it out 
    if (!$Result) {
        echo "Error: " . $Delete . "<br>" . $conn->error;
    }
    
    // return to the main page wich is index.php
    header("location:index.php");
} 