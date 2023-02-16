<?php 

require "connect.php";//connect to the db
if(isset($_GET["id"])){//check the id
    $ID = $_GET["id"];
    //store the request for annouce table and run it
    $query = $conn->query("SELECT * FROM announce WHERE `ID` = '$ID'"); $array = $query->fetch(PDO::FETCH_ASSOC);
   } 
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style3.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <title>Document</title>
  </head>
  <body>
<!-- ================================================== nav bar  ================================================================== -->
    <nav>
      <div>
        <a href="index.php"><img src="image/Vector.png" alt="Home Logo" /></a>
        <p>Our Home</p>
      </div>
      <div id="nav">
        <a href="index.php" id="announce">RETURN HOME</a>
      </div>
      <div id="profile">
        <a href="#"><img src="./image/profile.png" alt="profile logo" /></a>
      </div>
    </nav>

    <h1><?php if(isset($_GET["id"])){echo $array["TITTLE"];} ?></h1>
<!-- ================================================== cards infos ================================================================== -->
    
    <section class="infoContainer">
      <img src="image/<?php if(isset($_GET["id"])){echo $array["IMAGE"];} ?>.jpg" alt="" width="500">
      <div id="infos">
        <h2><?php if(isset($_GET["id"])){echo $array["PRICE"];} ?>DH</h2>
        <hr>
        <p>For <?php if(isset($_GET["id"])){echo $array["TYPE"];} ?></p>
        <p><?php if(isset($_GET["id"])){echo $array["DESCRIPTION"];} ?></p>
        <p class="silver"><?php if(isset($_GET["id"])){echo $array["SPACE"];} ?> m2</p>
        <p class="silver"><?php if(isset($_GET["id"])){echo $array["LOCATION"];} ?></p>
        <p class="silver"><?php if(isset($_GET["id"])){echo $array["DATE"];} ?></p>
      </div>
    </section>
  </body>
</html>
