<?php
require 'connect.php';// require the connect file that connects to the db
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if(isset($_POST['searchbtn'])){
    // retrieve the form inputs using $_POST and store them in the $queryParams array
if(!empty($_POST['city'])) {
    $queryParams[] = "City = '{$_POST['city']}'";
}

if(!empty($_POST['type'])) {
    $queryParams[] = "Type = '{$_POST['type']}'";
}

if(!empty($_POST['category'])) {
    $queryParams[] = "Category = '{$_POST['category']}'";
}

if(!empty($_POST['max_Price'])) {
    $queryParams[] = "Price <= {$_POST['max_Price']}";
}

if(!empty($_POST['min_Price'])) {
    $queryParams[] = "Price >= {$_POST['min_Price']}";
}

if(!empty($_POST['Date'])) {
    $queryParams[] = "PublishDate = '{$_POST['Date']}'";
}

// construct the SQL query
$sql = "SELECT * FROM annonce WHERE " . implode(" AND ", $queryParams);

// execute the query and display the results
$result = $conn->query($sql);
$FilterResult = $result->fetchAll(PDO::FETCH_ASSOC);
echo $sql;

}else {

$pageId ;
if(isset($_GET['pageId'])){
  $pageId = $_GET['pageId'];
} else { 
  $pageId = 1 ;
}

$endIndex = $pageId * 8;
$StartIndex  = $endIndex - 8 ;

$announcesDATA = $conn->query("SELECT * FROM annonce Limit 8 OFFSET $StartIndex")->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM annonce ';

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200;400;500;700&display=swap" rel="stylesheet">
    <!-- icon -->
    <script src="https://kit.fontawesome.com/c0019a3c9b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/home.css">
    <title>Document</title>
</head>

<body>


    <header>
    <nav class="navbar navbar-expand-lg fixed-top" id="nav">

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mr-4">
                        <a class="nav-link text-white" href="home.php">Home</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <a type="button" href="Account.php" class="btn nav-link px-3 me-2 text-white d-flex align-items-center gap-1 sign-in"
                        data-toggle="modal" data-target="#btn-signin">
                        Log In
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
        <!-- ========== div serch by city and type and categories and price ==========-->
        <div class=" vh-100 w-100 bg-img" >
            <div style="padding-top: 10em;" class="d-flex justify-content-center align-items-center">
                <img src="../img/logoSite.png" class="d-block"  alt="MDB Logo" loading="lazy" />
            </div>
            
                <div class="form-filter d-flex "  >
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="w-100 d-flex justify-content-center align-items-center flex-wrap gap-1">
                         <label for="" class="d-flex gap-1">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="city">
                                <option  disabled selected>/-- choose City --/</option>
                                <option value="Tanger">Tanger</option>
                                <option value="Rabat">Rabat</option>
                                <option value="Marakech">Marakech</option>
                                <option value="Fes">Fes</option>
                            </select>
                        </label>
                        <label for="" class="d-flex ml-1 gap-1">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                            <option  disabled selected>/-- choose Type --/</option>
                                <option value="apartment">apartment</option>
                                <option value="House">House</option>
                                <option value="Villa">Villa</option>
                                <option value="desk">desk</option>
                                <option value="ground">ground</option>
                            </select>
                        </label>
                        <label class="d-flex ml-1 gap-1">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category">
                            <option  disabled selected>/-- choose Category --/</option>
                                <option value="Rent">Rent</option>
                                <option value="Sale">Sale</option>
                            </select>
                        </label> 
                         
                        <label class="d-flex ml-1 gap-1" id="max-price">
                            <input name="max_Price" type="number" min="0" placeholder="Max Price"/>
                        </label>
                        <label class="d-flex ml-1 gap-1" id="min-Price">
                            <input name="min_Price" type="number" min="0" placeholder="Min Price"/>
                        </label>
                        <label class="d-flex ml-1 gap-1" id="min-Price">
                            <input name="Date" type="date" placeholder="Date"/>
                        </label>
                        <button name="searchbtn" type="submit" class="btn btn-warning ml-4" >Search</button>
                    </form>
                </div>
            
        </div>
</header>

<!-- ================================================== cards affiche ================================================================== -->
    <section class="container">
        <h2>Listings</h2>
       <div class="cards">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {//check if the method is get
          foreach($announcesDATA as $key => $val) { //loops in the table of annonce and display the in cards
            ?>
                <div class="card">
                    <div class="content"> 
                        <a href="info.php?id=<?php echo $val['AnnounceId'];?>">
                            <div class="content-overlay">
                            </div> 
                            <img class="content-image" src="../img/img.jpg">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title"><?php echo $val['Tittle'];?></h3>
                                <p class="content-text"><i class="fa fa-map-marker"></i><?php echo $val['Country'];?>,<?php echo $val['City'];?></p>
                            </div>
                        </a> 
                    </div>
                </div>
            <?php
            }
          } else if ($_SERVER["REQUEST_METHOD"] == "POST") { //check if the method is post
              foreach($FilterResult as $key => $val) { //loops in the table of annonce with filterd data and display the in cards 
                      ?>
                        <div class="card    ">
                            <div class="content"> 
                                <a href="info.php?id=<?php echo $val['AnnounceId'];?>">
                                    <div class="content-overlay">
                                    </div> 
                                    <img class="content-image" src="../img/img.jpg">
                                    <div class="content-details fadeIn-bottom">
                                        <h3 class="content-title"><?php echo $val['Tittle'];?></h3>
                                        <p class="content-text"><i class="fa fa-map-marker"></i> Russia</p>
                                    </div>
                                </a> 
                            </div>
                        </div>
                      <?php
                    }
                  }
              ?>
      </div>
    </section>







    <?php if($_SERVER["REQUEST_METHOD"] == "GET"){?>
  <nav class="mt-4 mb-4 " aria-label="Page navigation example">
    <ul class=" flex-wrap pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <?php for ($i=1; $i <= $pagesNum; $i++) { ?>
      <li class="page-item"><a class="page-link" href="<?php echo "user.php?pageId=".$i?>"><?php echo $i ;?></a></li>
      <?php }?>
      <li class="page-item"><a class="page-link" href="">Next</a></li>
    </ul>
  </nav>
  <?php
}
?>
  </div>




    <footer>
        hhhh
    </footer>
</body>
</html>