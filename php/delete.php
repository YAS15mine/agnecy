<?php
require "connect.php";

// Check if form is submitted
if (isset($_POST['deleteBtn'])) {

    // Get the ID of the record to be deleted
    $id = $_POST['id'];

    // Prepare SQL statement to delete the record
    $stmt = $pdo->prepare("DELETE FROM annonces WHERE id = :id");

    // Bind the ID parameter
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Check if the primary image exists and delete it
    $stmt = $pdo->prepare("SELECT primary_image FROM annonces WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $primaryImage = $row['primary_image'];
    if (file_exists('uploads/' . $primaryImage)) {
        unlink('uploads/' . $primaryImage);
    }

    // Check if any secondary images exist and delete them
    $stmt = $pdo->prepare("SELECT image FROM secondary_images WHERE announcement_id = :announcement_id");
    $stmt->bindParam(':announcement_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $image = $row['image'];
        if (file_exists('uploads/' . $image)) {
            unlink('uploads/' . $image);
        }
    }

    // Prepare SQL statement to delete the secondary images
    $stmt = $pdo->prepare("DELETE FROM secondary_images WHERE announcement_id = :announcement_id");

    // Bind the announcement ID parameter
    $stmt->bindParam(':announcement_id', $id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Redirect to the announcements page
    header('Location: announcements.php');
    exit();
}
?>
