<?php
require('connect.php');

// Prepare and execute the query to fetch ad data  
$query = "SELECT real_estate_gallery.*, images_gallery.image_path
          FROM real_estate_gallery
          INNER JOIN images_gallery ON real_estate_gallery.id = images_gallery.property_id
          WHERE primary_or_secondary = 'primary'";
try {
    $stmt = $pdo->query($query);
    $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$ads) {
        echo "No ads found!";
    }

} catch(PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
    exit;
}
?>

<?php foreach ($ads as $ad): ?>
<!-- Display the ad data in HTML -->
<div class="card" style="width: 18rem;">
    <img src="<?php echo $ad['image_path']; ?>" class="card-img-top" alt="Ad Image">
    <div class="card-body">
        <h5 class="card-title"><?php echo $ad['title']; ?></h5>
        <p class="card-text">Category: <span class="fw-bold"><?php echo $ad['category']; ?></span></p>
        <p class="card-text">Type: <span class="fw-bold"><?php echo $ad['type']; ?></span></p>
        <p class="card-text"><iconify-icon icon="fluent:slide-size-20-regular"></iconify-icon><span class="fw-bold"><?php echo $ad['surface']; ?></span></p>
        <p class="card-text"><iconify-icon icon="material-symbols:location-on"></iconify-icon><span class="fw-bold"><?php echo $ad['address']; ?></span></p>
        <p class="card-text">Price: <span class="fw-bold">$<?php echo $ad['price']; ?></span></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="#" class="btn btn-outline-warning rounded-circle me-md-2" role="button" data-bs-toggle="modal" data-bs-target="#edit1"><iconify-icon icon="material-symbols:edit-document-sharp"></iconify-icon></a>
            <a href="#" class="btn btn-outline-danger rounded-circle" data-bs-toggle='modal' data-bs-target='#delete1' role="button"><iconify-icon icon="material-symbols:auto-delete"></iconify-icon></a>
            <a href="#" class="btn btn-primary" role="button" >View Details</a>
        </div>
    </div>
</div>
<?php endforeach; ?>
