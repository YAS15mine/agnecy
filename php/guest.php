<?php
// retrieve the form inputs using $_POST
$city = $_POST['city'];
$type = $_POST['type'];
$category = $_POST['category'];
$max_price = $_POST['max_Price'];
$min_price = $_POST['min_Price'];
$date = $_POST['Date'];

// build the SQL query based on the user inputs
$sql = "SELECT * FROM my_table WHERE 1=1"; // 1=1 is used to ensure that the WHERE clause will always be valid

if (!empty($city)) {
  $sql .= " AND city = '$city'";
}

if (!empty($type)) {
  $sql .= " AND type = '$type'";
}

if (!empty($category)) {
  $sql .= " AND category = '$category'";
}

if (!empty($max_price)) {
  $sql .= " AND price <= $max_price";
}

if (!empty($min_price)) {
  $sql .= " AND price >= $min_price";
}

if (!empty($date)) {
  $sql .= " AND date = '$date'";
}

// execute the query and display the results
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  // display the results in a table or any other format you want
  // ...
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

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

                <!-- Button SIGN UP -->
                <!-- <button type="button" class="btn nav-link px-3 me-2 text-white d-flex align-items-center gap-1 sign-in"
                    data-toggle="modal" data-target="#addAnnonceModal">
                    <span>Sign Up</span>
                    <i class="fa-solid fa-user-plus"></i>
                </button> -->
                <!-- button LOG IN -->
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
            <div class="wrapper">
                <div class="form-filter d-flex "  >
                    <form action="search.php" method="POST"
                        class="w-100 d-flex justify-content-center align-items-center gap-1">
                        <label for="" class="d-flex gap-1">
                            <span>city:</span>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                            <option  disabled selected><-- choose an option --></option>
                                <option value="Tanger">Tanger</option>
                                <option value="Rabat">Rabat</option>
                                <option value="Marakech">Marakech</option>
                                <option value="Fes">Fes</option>
                            </select>
                        </label>
                        <label for="" class="d-flex ml-1 gap-1">
                            <span>type:</span>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                            <option  disabled selected><-- choose an option --></option>
                                <option value="apartment">apartment</option>
                                <option value="House">House</option>
                                <option value="Villa">Villa</option>
                                <option value="desk">desk</option>
                                <option value="ground">ground</option>
                            </select>
                        </label>
                        <label class="d-flex ml-1 gap-1">
                            <span>categories:</span>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                            <option  disabled selected><-- choose an option --></option>
                                <option value="Rent">For Rent</option>
                                <option value="Sale">For Sale</option>
                            </select>
                        </label>
                        <label class="d-flex ml-1 gap-1" id="max-price">
                            <span>Max Price: </span>
                            <input name="max_Price" type="number" min="0" />
                        </label>
                        <label class="d-flex ml-1 gap-1" id="min-Price">
                            <span>Min Price:</span>
                            <input name="min_Price" type="number" min="0" />
                        </label>
                        <label class="d-flex ml-1 gap-1" id="min-Price">
                            <span>Date</span>
                            <input name="Date" type="date"/>
                        </label>
                        <button name="searchbtn" type="submit" class="btn btn-warning ml-4" >
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
</header>
   


<main>
  

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="content"> <a href="#">
                        <div class="content-overlay">
                        </div> <img class="content-image" src="/img/img.jpg">
                        <div class="content-details fadeIn-bottom">
                            <h3 class="content-title">Geysers Valley Hotel</h3>
                            <p class="content-text"><i class="fa fa-map-marker"></i> Russia</p>
                        </div>
                    </a> </div>
            </div>


         <footer>

            
            
         </footer>




</main>
     


</body>

</html>