<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="zzzzzz.css">
  <title>Document</title>
</head>
<body>



  <section id="container">
    <form action="<?php if(isset($_GET['action'])){echo $_GET['action'];} ?>.php" method="get" id="form" class="form sign-up">
    <input type="hidden" name="id" value="<?php if(isset($_GET["id"])){echo $_GET["id"];} ?>">
        <div class="input-control">
            <input type="text" placeholder="Tittle" name="tittle" id="Tittle" value="<?php if(isset($_GET["id"])){echo $array["TITTLE"];} ?>">
            <div class="error"></div>
        </div>
        <div class="input-control">
            <input type="number" placeholder="Price" name="price" id="Price" value="<?php if(isset($_GET["id"])){echo $array["PRICE"];} ?>">
            <div class="error"></div>
        </div>
        <div class="input-control">
            <input type="number" placeholder="Space" name="space" id="Space" value="<?php if(isset($_GET["id"])){echo $array["SPACE"];} ?>">
            <div class="error"></div>
        </div>
        <div class="input-control">
            <input type="text" placeholder="Description" name="description" id="Description" value="<?php if(isset($_GET["id"])){echo $array["DESCRIPTION"];} ?>">
            <div class="error"></div>
        </div>
        <div class="input-control">
            <input type="text" placeholder="Location" name="location" id="Location" value="<?php if(isset($_GET["id"])){echo $array["LOCATION"];} ?>">
            <div class="error"></div>
        </div>
        <div class="input-control">
            <input type="date" placeholder="Date" name="date" id="Date" value="<?php if(isset($_GET["id"])){echo $array["DATE"];} ?>">
            <div class="error"></div>
        </div>
        <div class="input-control select">
            <input type="text" placeholder="Rent OR Sell" name="type" id="Type" value="<?php if(isset($_GET["id"])){echo $array["TYPE"];} ?>">
            <div class="error"></div>
        </div>
       <div class="input-control">
           <input type="text" placeholder="type URL " id="Image" name="image" value="<?php if(isset($_GET["id"])){echo $array["IMAGE"];} ?>">
           <div class="error"></div>
       </div>
       <div id="btn">
          <input type="hidden" name="submitIt" >
          <input type="submit" id="SubmitBtn" value="<?php if(isset($_GET["action"])){echo $_GET["action"];} ?>" class="submit" >
       </div>
      </form>
</section>

</body>
</html>