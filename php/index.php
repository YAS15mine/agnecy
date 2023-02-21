<?php 
require 'connect.php';

if(isset($_POST['valueSearch'])){

  $type = $_POST['type'];
  $priceMax = $_POST['priceMax'];
  $priceMin = $_POST['priceMin'];
  
  $sql= "SELECT * FROM `announces` WHERE `price` >= $priceMin   AND `price` <= $priceMax  AND `type`  = '$type' ";
  
  $statement = $conn->query($sql);
  
  $searchResult = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  } else {

$pageId ;
if(isset($_GET['pageId'])){
  $pageId = $_GET['pageId'];
} else { 
  $pageId = 1 ;

}

$endIndex = $pageId * 8 ;
$StartIndex  = $endIndex - 8 ;

$announcesDATA = $conn->query("SELECT * FROM announces Limit 8 OFFSET $StartIndex")->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM announces ';

// execute a query
$annoncesLength = $conn->query($sql)->rowCount();




// echo $annoncesLength[0];

$pagesNum = 0;

if(($annoncesLength % 6 ) == 0){

  $pagesNum = $annoncesLength / 8 ;

} else{
  $pagesNum = ceil($annoncesLength / 8);
}
}
?>















<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="#">
    <title>Agency</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container-fluid d-flex align-content-around">
        <img src="../img/logo.png" alt="logo" id="logo">
        <div class="" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Account.php">Sign In</a>
            </li>
          </ul>
        </div>
        <!-- <div>
          <img src="" alt="profile">
          <p>name</p>
        </div> -->
        <div>
          <a href="Account.php" class="btn btn-secondary sign">Sign In</a>
        </div>
      </div>
    </nav>







  <?php
  if($_SERVER["REQUEST_METHOD"] == "GET"){
  ?>

  <nav class="mt-4 mb-4 " aria-label="Page navigation example">
    <ul class=" flex-wrap pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <?php
  for ($i=1; $i <= $pagesNum; $i++) { 
    ?>
      <li class="page-item"><a class="page-link" href="<?php echo "index.php?pageId=".$i?>"><?php echo $i ;?></a></li>

  <?php

  }

  ?>
      <li class="page-item"><a class="page-link" href="">Next</a></li>
    </ul>
  </nav>
  <?php

  }

  ?>
  </div>
      





















    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
