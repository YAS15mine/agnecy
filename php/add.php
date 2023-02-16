<?php
require 'connect.php';//connect to the db with the connect file 
if(isset($_GET["id"])){
  $ID = $_GET["id"];
  //store the request in a variable
  $query = $conn->query("SELECT * FROM announce WHERE `ID` = '$ID'");
  $array = $query->fetch(PDO::FETCH_ASSOC); //execute the request
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <title>Home</title>
  </head>
  <body>
<!-- ================================================== navbar ================================================================== -->
    <nav>
      <div>
        <a href="index.php"><img src="image/Vector.png" alt="Home Logo" /></a>
        <p>Our Home</p>
      </div>
      <div id="nav">
      <a href="index.php" id="announce">RETURN HOME</a>
      </div>
      <div id="profile">
        <a href="index.php"><img src="image/profile.png" alt="profile logo" /></a>
      </div>
    </nav>
    <div>
      <h1> <?php if(isset($_GET["action"])){echo $_GET["action"];} ?> Your Home <br/> and Wait for the buyer </h1>
    </div>
<!-- ================================================== form of add and update the data from the table ================================================================== -->

    <section id="container">
        <form action="<?php if(isset($_GET["action"])){echo $_GET["action"];} ?>.php" method="get" id="form">
        <input type="hidden" name="id" value="<?php if(isset($_GET["id"])){echo $_GET["id"];} ?>">
            <div class="input-control">
                <input type="text" placeholder="enter tittle ..." name="tittle" id="Tittle" value="<?php if(isset($_GET["id"])){echo $array["TITTLE"];} ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="number" placeholder="enter Price ..." name="price" id="Price" value="<?php if(isset($_GET["id"])){echo $array["PRICE"];} ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="number" placeholder="enter Space in m2 ..." name="space" id="Space" value="<?php if(isset($_GET["id"])){echo $array["SPACE"];} ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="text" placeholder="enter description ..." name="description" id="Description" value="<?php if(isset($_GET["id"])){echo $array["DESCRIPTION"];} ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="text" placeholder="enter Adress ..." name="location" id="Location" value="<?php if(isset($_GET["id"])){echo $array["LOCATION"];} ?>">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <input type="date" placeholder="enter date ..." name="date" id="Date" value="<?php if(isset($_GET["id"])){echo $array["DATE"];} ?>">
                <div class="error"></div>
            </div>
            <div class="input-control select">
                <input type="text" placeholder="Rent OR Sell ..." name="type" id="Type" value="<?php if(isset($_GET["id"])){echo $array["TYPE"];} ?>">
                <div class="error"></div>
            </div>
           <div class="input-control">
               <input type="text" placeholder="type URL ..." id="Image" name="image" value="<?php if(isset($_GET["id"])){echo $array["IMAGE"];} ?>">
               <div class="error"></div>
           </div>
           <div id="btn">
              <input type="hidden" name="submitIt" >
              <input type="submit" id="SubmitBtn" value="<?php if(isset($_GET["action"])){echo $_GET["action"];} ?>" class="submit" >
           </div>
          </form>
    </section>
<!-- ================================================== footer ================================================================== -->

    <footer>
      <div>
        <div>
          <img src="image/Vec.png" alt="copyright" />
          <p>All Rights Are Reserved</p>
        </div>
      </div>
    </footer>
    <script src="script.js"></script>
  </body>
</html>