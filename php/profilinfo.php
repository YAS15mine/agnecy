<?php
require('connect.php');
$user_id = 1; // Replace 1 with the actual user ID
$sql = "SELECT first_name, last_name, phone_number, email, password FROM clients WHERE user_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);

if ($stmt->rowCount() > 0) {
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $first_name = $row["first_name"];
  $last_name = $row["last_name"];
  $phone_number = $row["phone_number"];
  $email = $row["email"];
  $password = $row["password"];

  // Replace HB with the user's initials
  $initials = strtoupper(substr($first_name, 0, 1) . substr($last_name, 0, 1));
} else {
  echo "User not found.";
}

?>
  <!-- Display user's information using HTML code -->
  <div class="profilinfo d-flex gap-5 " style="height: 320px; padding: 0%;">
    <div class="rounded-circle bg-dark d-flex justify-content-center align-items-center" style="width: 300px; height: 300px;">
      <span class="text-white display-1 font-weight-bold"><?php echo $initials; ?></span>
    </div>
    <div class="userinfo bg-light p-4 rounded">
      <p class="card-text">First name: <span class="fw-bold"><?php echo $first_name; ?></span></p>
      <p class="card-text">Last name: <span class="fw-bold"><?php echo $last_name; ?></span></p>
      <p class="card-text">Phone number: <span class="fw-bold"><?php echo $phone_number; ?></span></p>
      <p class="card-text">Email: <span class="fw-bold"><?php echo $email; ?></span></p>
      <p class="card-text">Password: <span class="fw-bold"><?php echo $password; ?></span></p>
      <div class="editprofil"><button  type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#editModal" >Edit <iconify-icon icon="material-symbols:edit"></iconify-icon></button></div>
    </div>
  </div>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit <iconify-icon icon="material-symbols:edit"></iconify-icon>
</button>

