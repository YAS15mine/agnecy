<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'your_database_name';
$username = 'your_database_username';
$password = 'your_database_password';

// Create PDO object and set error mode to exceptions
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if form is submitted
if (isset($_POST['updateBtn'])) {

    // Get form inputs
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $superficie = $_POST['superficie'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    // Prepare SQL statement to update the announcement
    $stmt = $pdo->prepare("
        UPDATE annonces
        SET 
            title = :title,
            price = :price,
            address = :address,
            superficie = :superficie,
            type = :type,
            description = :description
        WHERE id = :id
    ");

    // Bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':superficie', $superficie, PDO::PARAM_INT);
    $stmt->bindParam(':type', $type, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    // Check if primary image is uploaded
    if (isset($_FILES['primary_image']) && $_FILES['primary_image']['error'] === 0) {

        // Get the file details
        $fileName = $_FILES['primary_image']['name'];
        $fileSize = $_FILES['primary_image']['size'];
        $fileTmpName = $_FILES['primary_image']['tmp_name'];
        $fileType = $_FILES['primary_image']['type'];

        // Get the file extension
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

        // Generate a unique file name
        $newFileName = uniqid() . '.' . $fileExt;

        // Move the uploaded file to the desired directory
        move_uploaded_file($fileTmpName, 'uploads/' . $newFileName);

        // Prepare SQL statement to update the primary image
        $stmt = $pdo->prepare("
            UPDATE annonces
            SET primary_image = :primary_image
            WHERE id = :id
        ");

        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':primary_image', $newFileName, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();
    }

// Check if secondary images are uploaded
if (!empty($_FILES['secondary_image'])) {
    // Loop through the files array
    foreach ($_FILES['secondary_image']['name'] as $key => $name) {
        // Check if file was uploaded successfully
        if ($_FILES['secondary_image']['error'][$key] === UPLOAD_ERR_OK) {
            // Get the file details
            $fileName = $_FILES['secondary_image']['name'][$key];
            $fileSize = $_FILES['secondary_image']['size'][$key];
            $fileTmpName = $_FILES['secondary_image']['tmp_name'][$key];
            $fileType = $_FILES['secondary_image']['type'][$key];

            // Get the file extension
            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

            // Generate a unique file name
            $newFileName = uniqid() . '.' . $fileExt;

            // Move the uploaded file to the desired directory
            move_uploaded_file($fileTmpName, 'uploads/' . $newFileName);

            // Prepare SQL statement to insert the secondary image
            $stmt = $pdo->prepare("
                INSERT INTO secondary_images (announcement_id, image)
                VALUES (:announcement_id, :image)
            ");

            // Bind parameters
            $stmt->bindParam(':announcement_id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':image', $newFileName, PDO::PARAM_STR);

            // Execute the statement
            $stmt->execute();
        }
    }
}
}
?>  