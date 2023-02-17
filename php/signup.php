<?php

require 'connect.php';//connect to the db with the connect file 


?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/sign_style.css" />
    <link rel="stylesheet" href="../css/style.css" />

    <title>Sign In</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container-fluid d-flex align-content-around">
        <img src="../img/logo.png" alt="logo" id="logo" />
        <div class="" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signin.php">Sign IN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign UP</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="d-flex container mt-4">
      <div id="image"></div>

      <div class="ms-5">
        <h2>Create Your account</h2>
        <form action="add.php" class="container" method="get" id="form">
          <div></div>
          <div class="d-flex flex-wrap">
            <div class="me-5">
              <label>First Name</label>
              <div class="input-container">
                <input type="text" id="input-with-icon" class="w-100" name="Fname" placeholder="Enter text" />
              </div>
            </div>
            <div>
              <label>Last Name</label>
              <div class="input-container">
                <input type="text" id="input-with-icon" class="w-100" name="Lname" placeholder="Enter text" />
              </div>
            </div>
          </div>
          <label>Email</label>
          <div class="input-container">
            <input type="text" id="input-with-icon" class="w-100" name="Email" placeholder="Enter Email" />
          </div>
          <label>Phone Number</label>
          <div class="input-container phone">
            <input type="number" id="input-with-icon" class="w-100" name="Phone" placeholder="Enter Phone Number" />
          </div>
          <label>Password</label>
          <div class="input-container pass pt-2">
            <input type="password" id="input-with-icon" class="w-100" name="Password" placeholder="Enter Password" />
          </div>
          <label>Confirm Password</label>
          <div class="input-container pass">
            <input type="password" id="input-with-icon" class="w-100" placeholder="Enter Password" />
          </div>
          <div>
            <input type="submit" id="Sign" value="Sign Up" class="btn btn-primary w-25 p-2" />
          </div>
        </form>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
