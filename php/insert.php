<?php



require_once 'connect.php'; // Use require_once instead of require

// Retrieving form data

$title = $_POST['title'];
$category = $_POST['category'];
$price = $_POST['price'];
$address = $_POST['address'];
$surface = $_POST['surface'];
$type = $_POST['type'];
$description = $_POST['description'];

$user_id = 5;

// Inserting data into real_estate_gallery table
$stmt = $pdo->prepare("INSERT INTO real_estate_gallery (user_id, title, category, price, address, surface, type, description) 
                        VALUES (:user_id, :title, :category, :price, :address, :surface, :type, :description)");



$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':surface', $surface);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':description', $description);
$stmt->execute();

// Get the ID of the inserted row
$property_id = $pdo->lastInsertId();

// prepare and bind the insert statement
$stmt = $pdo->prepare("INSERT INTO images_gallery (primary_or_secondary, image_path, property_id) VALUES (:primary_or_secondary, :image_path, :property_id)");

// loop through the uploaded images
for($i = 0; $i < count($_FILES['images']['name']); $i++) {
  $filename = $_FILES['images']['name'][$i];
  $filetmp = $_FILES['images']['tmp_name'][$i];
  $filetype = $_FILES['images']['type'][$i];
  $filesize = $_FILES['images']['size'][$i];
  $fileext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  // generate a unique filename for the uploaded image
  $unique_filename = uniqid() . "." . $fileext;

  // move the uploaded image to the images folder
  move_uploaded_file($filetmp, "images/" . $unique_filename);

  // determine if the image is a primary or secondary image
  if($i == 0) {
    $primary_or_secondary = "primary";
  } else {
    $primary_or_secondary = "secondary";
  }

  // bind the parameters and execute the insert statement
  $stmt->bindParam(':primary_or_secondary', $primary_or_secondary);
  $stmt->bindParam(':image_path', $unique_filename);
  $stmt->bindParam(':property_id', $property_id);
  $stmt->execute();
}

// close the prepared statement and database connection
$stmt = null;
$pdo = null;
?>
