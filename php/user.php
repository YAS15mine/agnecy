<?php
session_start();
require 'functions.php';

require 'connect.php';

require 'navbar.php';




if (isset($_POST['searchbtn'])) {
    // retrieve the form inputs using $_POST and store them in the $queryParams array
    if (!empty($_POST['city'])) {
        $queryParams[] = "City = '{$_POST['city']}'";
    }

    if (!empty($_POST['type'])) {
        $queryParams[] = "Type = '{$_POST['type']}'";
    }

    if (!empty($_POST['category'])) {
        $queryParams[] = "Category = '{$_POST['category']}'";
    }

    if (!empty($_POST['max_Price'])) {
        $queryParams[] = "Price <= {$_POST['max_Price']}";
    }

    if (!empty($_POST['min_Price'])) {
        $queryParams[] = "Price >= {$_POST['min_Price']}";
    }

    if (!empty($_POST['Date'])) {
        $queryParams[] = "PublishDate = '{$_POST['Date']}'";
    }

    // construct the SQL query

    // $sql = "SELECT * FROM annonce  WHERE  " . implode(" AND ", $queryParams);
    $sql = "SELECT annonce.*, img.image_path AS primary_image_path
        FROM annonce
        LEFT JOIN (
            SELECT ad_id, MIN(image_path) AS image_path
            FROM image_d_annonce
            WHERE primary_or_secondary = 'primary'
            GROUP BY ad_id
        ) img ON annonce.ad_id = img.ad_id
        WHERE " . implode(" AND ", $queryParams);


    // execute the query and display the results
    $result = $conn->query($sql);
    $FilterResult = $result->fetchAll(PDO::FETCH_ASSOC);
} else {

    $pageId;

    if (isset($_GET['pageId'])) {
        $pageId = $_GET['pageId'];
    } else {
        $pageId = 1;
    }

    $endIndex = $pageId * 8;
    $StartIndex  = $endIndex - 8;


    // $announcesDATA = $conn->query("SELECT * FROM annonce Limit 8 OFFSET $StartIndex")->fetchAll(PDO::FETCH_ASSOC);
    $announcesDATA = $conn->query("SELECT a.*, i.image_path AS primary_image_path
FROM annonce a LEFT JOIN image_d_annonce i ON a.ad_id = i.ad_id AND i.primary_or_secondary = 'primary' LIMIT 8 OFFSET $StartIndex")->fetchAll(PDO::FETCH_ASSOC);

$primaryImagePaths = array();
foreach ($announcesDATA as $val) {
    $primaryImagePaths[$val['ad_id']] = $val['primary_image_path'];
}


    $sql = 'SELECT * FROM annonce';

    // execute a query
    $annoncesLength = $conn->query($sql)->rowCount();

    // echo $annoncesLength[0];

    $pagesNum = 0;

    if (($annoncesLength % 8) == 0) {

        $pagesNum = $annoncesLength / 8;
    } else {
        $pagesNum = ceil($annoncesLength / 8);
    }
}

?>




<!-- ========== div serch by city and type and categories and price ==========-->
<div class=" vh-100 w-100 bg-img">
    <div style="padding-top: 10em;" class="d-flex justify-content-center align-items-center">
        <img src="../img/logoSite.png" class="d-block" alt="MDB Logo" loading="lazy" />
    </div>

    <div class="form-filter d-flex ">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="w-100 d-flex justify-content-center align-items-center flex-wrap gap-1">
            <label for="" class="d-flex gap-1">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="city">
                    <option disabled selected>/-- choose City --/</option>
                    <option value="Tanger">Tanger</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Marakech">Marakech</option>
                    <option value="Fes">Fes</option>
                </select>
            </label>
            <label for="" class="d-flex ml-1 gap-1">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                    <option disabled selected>/-- choose Type --/</option>
                    <option value="apartment">apartment</option>
                    <option value="House">House</option>
                    <option value="Villa">Villa</option>
                    <option value="desk">desk</option>
                    <option value="ground">ground</option>
                </select>
            </label>
            <label class="d-flex ml-1 gap-1">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category">
                    <option disabled selected>/-- choose Category --/</option>
                    <option value="Rent">Rent</option>
                    <option value="Sale">Sale</option>
                </select>
            </label>

            <label class="d-flex ml-1 gap-1" id="max-price">
                <input name="max_Price" type="number" min="0" placeholder="Max Price" />
            </label>
            <label class="d-flex ml-1 gap-1" id="min-Price">
                <input name="min_Price" type="number" min="0" placeholder="Min Price" />
            </label>
            <label class="d-flex ml-1 gap-1" id="min-Price">
                <input name="Date" type="date" placeholder="Date" />
            </label>
            <button name="searchbtn" type="submit" class="btn btn-warning ml-4">Search</button>
        </form>
    </div>

</div>
</header>
<!-- ================================================== cards affiche ================================================================== -->
<section class="container">
    <h2>Listings</h2>
    <div class="cards">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") { //check if the method is get
            foreach ($announcesDATA as $key => $val) { //loops in the table of annonce and display the in cards
        ?>
                <div class="card">
                    <div class="content">
                        <a href="details.php?ad_id=<?php echo $val['ad_id']; ?>">
                            <div class="content-overlay">
                            </div>
                            <img class="content-image" src="..<?php echo $primaryImagePaths[$val['ad_id']]; ?>">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title"><?php echo $val['title']; ?></h3>

                                <p class="content-text"><i class="fa fa-map-marker"></i> <?php echo $val['Contry']; ?>,<?php echo $val['City']; ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
            }
        } else if ($_SERVER["REQUEST_METHOD"] == "POST") { //check if the method is post
            foreach ($FilterResult as $key => $val) {
                echo "<pre>";
                var_dump($val);
                echo "</pre>";
            ?>
                <div class="card    ">
                    <div class="content">
                        <a href="details.php?ad_id=<?php echo $val['ad_id']; ?>">
                            <div class="content-overlay">
                            </div>
                            <img class="content-image" src="../img/img.jpg">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title"><?php echo $val['title']; ?></h3>
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
<?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
    <nav class="mt-4 mb-4 " aria-label="Page navigation example">
        <ul class=" flex-wrap pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <?php for ($i = 1; $i <= $pagesNum; $i++) { ?>
                <li class="page-item"><a class="page-link" href="<?php echo "user.php?pageId=" . $i ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
<?php  } 
?>
</div>
</body>

</html>