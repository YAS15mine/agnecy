<?php 
require "connect.php";//connect to the db
if(isset($_GET["AnnounceId"])){//check the id
  $AnnounceId = $_GET["AnnounceId"];
  //store the request for annouce table and run it
  $query = $conn->query("SELECT * FROM Annonce WHERE `AnnounceId` = $AnnounceId"); 
  $array = $query->fetch(PDO::FETCH_ASSOC);
} 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Infos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style_detail.css">
    <link rel="stylesheet" href="../css/home.css">
  </head>
  <body>
    <div class = "card-wrapper">
      <div class = "card">
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "../img/1.png" alt = "shoe image">
              <img src = "../img/2.png" alt = "shoe image">
              <img src = "../img/3.png" alt = "shoe image">
              <img src = "../img/4.png" alt = "shoe image">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "../img/1.png" alt = "shoe image1">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "../img/2.png" alt = "shoe image2">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "../img/3.png" alt = "shoe image3">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "../img/4.png" alt = "shoe image4">
              </a>
            </div>
          </div>
        </div>
        <div class = "product-content">
          <h2 class = "product-title"><?php if(isset($_GET["AnnounceId"])){echo $array["Tittle"];} ?></h2>
          <a href = "#" class = "product-link"><?php if(isset($_GET["AnnounceId"])){echo $array["Category"];} ?></a>
          <div class = "product-price">
            <p class = "new-price">Price: <span><?php if(isset($_GET["AnnounceId"])){echo $array["Price"];} ?> DH</span></p>
          </div>
          <div class = "product-detail">
            <h2>Description :</h2>
            <p><?php if(isset($_GET["AnnounceId"])){echo $array["Descripton"];} ?></p>
            <ul>
              <li>Size : <span><?php if(isset($_GET["AnnounceId"])){echo $array["Size"];} ?> m2</span></li>
              <li>Category: <span><?php if(isset($_GET["AnnounceId"])){echo $array["Category"];} ?></span></li>
              <li>Location : <span><?php if(isset($_GET["AnnounceId"])){echo $array["Country"];} ?>,<?php if(isset($_GET["AnnounceId"])){echo $array["City"];} ?></span></li>
              <li>Publication Date: <span><?php if(isset($_GET["AnnounceId"])){echo $array["PublishDate"];} ?></span></li>
              <li>Zip Code: <span><?php if(isset($_GET["AnnounceId"])){echo $array["ZipCode"];} ?></span></li>
            </ul>
          </div>
          <div class = "purchase-info">
            <button type = "button" class = "btn">Contact Seller</button>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/app.js"></script>
  </body>
</html>