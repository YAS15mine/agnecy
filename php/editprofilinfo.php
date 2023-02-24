<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit User Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="edit.php">
          <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
          </div>
          <div class="mb-3">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber; ?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
          </div>
          <div class="mb-3">
            <label for="currentPassword" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="currentPassword" name="currentPassword">
          </div>
          <div class="mb-3">
            <label for="newPassword" class="form-label">New Password</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword">
          </div>
          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
          </div>
          <input type="hidden" name="userId" value="<?php echo $userId; ?>">
          <button type="submit" class="btn btn-primary" name="editUser">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
// Check if the form was submitted
if (isset($_POST['editUser'])) {
  // Get the user ID and form data
  $userId = $_POST['userId'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $phoneNumber = $_POST['phoneNumber'];
  $email = $_POST['email'];
  $currentPassword = $_POST['currentPassword'];
  $newPassword = $_POST['newPassword'];
  $confirmPassword = $_POST['confirmPassword'];
  $errors = array();

  // Check if the current password is correct
  $stmt = $pdo->prepare("SELECT password FROM users WHERE id = :id");
  $stmt->bindParam(':id', $userId);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $hashedPassword = $row['password'];
  if (!password_verify($currentPassword, $hashedPassword)) {
    $errors['currentPassword'] = 'Incorrect password';
  }

  // Check if the new password matches the confirmation password
  if ($newPassword !== $confirmPassword) {
    $errors['confirmPassword'] = 'Passwords do not match';
  }

  // If there are no errors, update the user information
  if (count($errors) === 0) {
    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the user information in the database
    $stmt = $pdo->prepare("UPDATE users SET first_name = :firstName, last_name = :lastName, phone_number = :phoneNumber, email = :email, password = :password WHERE id = :id");
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':phoneNumber', $phoneNumber);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();

    // Redirect to the profile page
    header('Location: profile.php');
    exit();
  }
}
?>
