<?php
session_start();
include ('connect.php');
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("Location: Account.php");
  exit();
}
?>
