<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/sign_style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
	<title>Login Or Sign Up</title>
</head>
<body>
  <div class="cont">
                                <!-- ================= sign In ================== -->
    <form action="SignIn.php" method="post">
        <div class="form sign-in">
            <h2>Sign In</h2>
            <label>
                <input type="email" name="email" placeholder="Email Address">
            </label>
            <label>
                <input type="password" name="password" placeholder="Password">
            </label>
            <button type="submit" class="submit">Sign In</button>
        </div>
    </form>

                                <!-- ================= image ================== -->
    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
                                <!-- ================= Sign Up ================== -->
      <form action="SignUp.php" method="get">
        <div class="form sign-up">
            <h2>Sign Up</h2>
            <label>
            <input type="text" name="fname" placeholder="First Name">
            </label>
            <label>
            <input type="text" name="lname" placeholder="Last Name">
            </label>
            <label>
            <input type="email" name="email" placeholder="Email">
            </label>
            <label>
            <input type="number" name="phone" placeholder="Phone Number">
            </label>
            <label>
            <input type="password" name="password" placeholder="Password">
            </label>
            <label>
            <input type="password" placeholder="Confirm Password">
            </label>
            <button type="submit" class="submit">Sign Up Now</button>
        </div>
      </form>
    </div>
  </div>



  
<script type="text/javascript" src="../js/script.js"></script>
</body>
</html>