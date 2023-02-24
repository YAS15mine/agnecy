<!DOCTYPE html>
<html>
  <?php require('connect.php'); ?>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Italiana&display=swap" rel="stylesheet"/>
    <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="../css/style_profile.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.3/iconify-icon.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home</a>
            </li>
          </ul>
        </div>
        <div class="d-flex">
            <a class="navbar-brand" href="#"><iconify-icon icon="mdi:user-circle-outline"></iconify-icon></a>
            <a class="navbar-brand" href="#"><iconify-icon icon="mingcute:notification-line"></iconify-icon></a>
          </div>
      </nav>
      <div class="container">
      <!-- require('profilinfo.php');  -->
      <div class="addcard d-flex justify-content-center align-items-center"><button class="btn btn-warning mt-3 text-white"  data-bs-target="#addModal" data-bs-toggle="modal">add a new card <iconify-icon icon="material-symbols:add-circle" style="color: white;" ></iconify-icon></button></div>
<div class="allcards d-flex flex-wrap gap-3">
<?php require('displaycards.php'); 
  echo __DIR__;
  ?>
</div>
<?php require('editprofilinfo.php'); ?>
<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content h-25">
      <div class="modal-body bgmodal">
        <form action="insert.php" method="POST" id="myForm"  enctype="multipart/form-data">
          <h2>Ajouter l'anonce</h2>
          <div class="container d-flex gap-2">
            <div class=" file-input d-md-flex flex-column justify-content-center align-items-center mb-3 w-25 h-25 d-flex">
              <img id="icon" src="cloud-upload.svg" alt="Upload Icon"/>
              <input type="file" name="images[]" id="fileInput"/>
              <img class="previewImage" id="previewImage" src="#" alt="Image Preview" />
            </div>
              <div class="secondary-image-wrapper file-input d-md-flex flex-column justify-content-center align-items-center mb-3 w-25 h-25 d-flex">
                <img id="icon1" src="cloud-upload.svg" alt="Upload Icon" />
                <input type="file" name="images[]" id="fileInput1" />
                <img class="previewImage" id="previewImage1" src="#" alt="Image Preview" />
              </div>
              <div class="secondary-image-wrapper file-input d-md-flex flex-column justify-content-center align-items-center mb-3 w-25 h-25 d-flex">
                <img id="icon2" src="cloud-upload.svg" alt="Upload Icon" />
                <input type="file" name="images[]" id="fileInput2" />
                <img class="previewImage" id="previewImage2" src="#" alt="Image Preview" />
              </div>
              <div class="secondary-image-wrapper file-input d-md-flex flex-column justify-content-center align-items-center mb-3 w-25 h-25 d-flex">
                <img id="icon3" src="cloud-upload.svg" alt="Upload Icon" />
                <input type="file" name="images[]" id="fileInput3" />
                <img class="previewImage" id="previewImage3" src="#" alt="Image Preview" />
              </div>
              <div class="secondary-image-wrapper file-input d-md-flex flex-column justify-content-center align-items-center mb-3 w-25 h-25 d-flex">
                <img id="icon4" src="cloud-upload.svg" alt="Upload Icon" />
                <input type="file" name="images[]" id="fileInput4" />
                <img class="previewImage" id="previewImage4" src="#" alt="Image Preview" />
              </div>
          </div>
          
          <div class="d-flex flex-wrap gap-3">
            <div class="mb-3">
              <label for="exampleFormControlInput0" class="form-label">Titre</label>
              <input type="text" name="title" class="form-control" id="titleAdd" placeholder="Titre" />
              <p id="titleError">Veuillez saisir un titre valide.</p>
            </div>
              <div class="mb-3">
              <label for="exampleFormControlInput0" class="form-label">category</label>
              <input type="text" name="category" class="form-control" id="titleAdd" placeholder="Titre" />
              <p id="titleError">Veuillez saisir un category valide.</p>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Montant</label>
              <input type="number" min="0" name="price" class="form-control" id="priceAdd" placeholder="Montant" />
              <p id="priceError">Veuillez saisir un montant valide.</p>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Adresse</label>
              <input type="text" name="address" class="form-control" id="addressAdd" placeholder="Adresse" />
              <p id="addressError">Veuillez saisir une adresse valide.</p>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">surface</label>
              <input type="number" min="0" name="surface" class="form-control" id="superficieAdd" placeholder="Superficie" />
              <p id="superficieError">Veuillez saisir une superficie valide.</p>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Type</label>
              <select class="form-select" name="type" id="typeAdd">
                <option selected disabled>Choisir</option>
                <option value="Location">Location</option>
                <option value="Vente">Vente</option>
              </select>
              <p id="typeError">Veuillez choisir un type.</p>
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea2" rows="3"></textarea>
          </div>
          <div class="justify-content-center d-flex">
            <button name="addBtn" value="addBtn" type="submit" class="btn buttons" id="addBtn">Ajouter</button>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>
  <!-- Modal edit-->
  <div class="modal fade h-5" id="edit1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content h-25">
        <div class="modal-body  bgmodal">
          <form action="edit.php" method="post" enctype="multipart/form-data">
            <div class="container">
            <input type="hidden" name="edit_id"  >
              <h2>Modifier l'annonce</h2>
              <div class="file-inputs d-md-flex flex-column justify-content-center align-items-center mb-3">
              <img id="icons" src="pexels-max-vakhtbovych-6032416 2.png" alt="Upload Icon" />
              <input type="file" name="image" id="fileInputs" />
              <img class="previewImage" id="previewImages[]src="#" alt="Image Preview" />
            </div>
            </div>
            <div class="d-flex flex-wrap gap-3">
              <div class="mb-3">
                <label for="titreedit" class="form-label">Titre</label>
                <input type="text" class="form-control" name="titreedit" id="titreedit"  />
              </div>
              <div class="mb-3">
                <label for="montantedit" class="form-label">Montant</label>
                <input type="number" class="form-control" name="montantedit" id="montantedit"   />
              </div>
              <div class="mb-3">
                <label for="Adresseedit" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="Adresseedit" id="Adresseedit"   />
              </div>
              <div class="mb-3">
                <label for="Superficieedit" class="form-label">Superficie</label>
                <input type="number" class="form-control" name="Superficieedit" id="Superficieedit"   />
              </div>
              <div class="mb-3">
                <label for="typeedit" class="form-label">Type</label>
                  <select class="form-select" name="typeedit" id="typeedit">
                  <option disabled>Choisir</option>
                  <option value="Location"selected>Location</option>
                  <option value="Vente">Vente</option>
                </select>        
              </div>
            </div>
            <div class="mb-3">
              <label for="descriptionedit" class="form-label">Description</label>
              <textarea class="form-control" name="descriptionedit" id="descriptionedit"></textarea>
            </div>
            <div class="justify-content-center d-flex">
              <button type="submit" name="updat" value="updat" class="btn buttons">
                Modifier
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal delete -->
   <div class="modal" id="delete1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content h-25">
        <div class="modal-body texte-white bgmodal">
          <h3>étes vous sure de vouloir supprimer</h3>
          <form method="post" action="delet.php">
          <input type="hidden" name="delete_id" id="delete_id">
            <button  type="submit" name="delet"  class="btn buttons">
              Supprimer
            </button>
            <button type="button" class="btn btn-secondary buttons" data-bs-dismiss="modal">
              Annuler
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
          integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
          crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
          integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
          crossorigin="anonymous"></script>
          <script src="../js/index.js"></script>
        </body>
</html>
