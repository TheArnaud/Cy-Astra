<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="stylePROFILE.css"/>

    <title>CY Astra</title>
  
    </head>


<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-custom">
        <div class="container-fluid">
        <a class="navbar-brand" style="color:white;font-size:35px" href="#">CY ASTRA</a>
            <button class="navbar-toggler ml-auto custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="text-align:center">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="accueil.php">Accueil</a>
                </li> 
                <li class="nav-item">
                <a class="nav-link" href="boutique.php">Boutique</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="events.php">Événement</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="accueil.php#ABOUT">À propos</a>
                </li>
            </ul>
            <div class="btn-group" role="group" >

                <a type="button" class="btn btn-outline-light" href="panier.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewbox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                    
                    Panier
                
                </a>

                <div class="btn-group" role="group" id="delete2">

                <a type="button" class="btn btn-outline-light" href="modifierProfil.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                     </svg>
                </a>'
            
                </div>
            </div>
            </div>
        </div>
        </nav>


  <h1>
  <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  </svg>
  Profil
  </h1>


<div class="formulaire">
    <!-- form de modification de profil, les champs sont pré-rempllis lorsque des données database existent -->
    <form class="needs-validation" action="dbbMembres.php" method="post" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="nom">Nom Prénom</label>
      <!-- Dans value, on affiche les données de l'utilisateur si elles existent, sinon on affiche une valeur par défaut: un blanc-->
      <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom Prénom" value="<?php echo isset($_SESSION["nom"]) ? $_SESSION["nom"] : '';?>" required> <!-- required pour que la partie soit obligatoirement remplit avant enregistrement-->
      <div class="valid-feedback">
        Valide                    <!-- Si le nom n'est pas vide on dit que c'est valide (pas de vérification supplémentaire) -->
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="dateNaissance">Date de naissance</label>
      <input type="date" class="form-control" name="dateNaissance" id="dateNaissance" value="" required>
      <div class="valid-feedback">
        Valide
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="pseudp">Pseudonyme</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudonyme" aria-describedby="inputGroupPrepend" value="<?php echo isset($_SESSION["pseudonyme"]) ? $_SESSION["pseudonyme"] : '';?>" required>
        <div class="invalid-feedback">
          Veuiller choisir un pseudonyme
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="email">Email</label>
      <div class="input-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Adresse email" aria-describedby="inputGroupPrepend" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : '';?>" required>
        <div class="invalid-feedback">
          Veuiller renseigner votre adresse email
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="password">Mot de passe</label>
      <div class="input-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" aria-describedby="inputGroupPrepend" value="<?php echo isset($_SESSION["motdepasse"]) ? $_SESSION["motdepasse"] : '';?>" required>
        <div class="invalid-feedback">
          Veuiller renseigner un mot de passe
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="ville">Ville</label>
      <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville" value="<?php echo isset($_SESSION["ville"]) ? $_SESSION["ville"] : '';?>" required>
      <div class="invalid-feedback">
      Veuiller renseigner une ville valide
      </div>
    </div>
  <div class="form-row">
  <div class="col-md-6 mb-3">
      <label for="adresse">Adresse</label>
      <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" value="<?php echo isset($_SESSION["adresse"]) ? $_SESSION["adresse"] : '';?>" required>
      <div class="invalid-feedback">
      Veuiller renseigner une adresse valide
      </div>
    </div>
    <label>Sexe</label><br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="male" <?php if(isset($_SESSION["sexe"]) && $_SESSION["sexe"] == "male")echo 'checked'; ?>>
      <label class="form-check-label" for="inlineRadio1">Homme</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="female" <?php if(isset($_SESSION["sexe"]) && $_SESSION["sexe"] == "female")echo 'checked'; ?>>
      <label class="form-check-label" for="inlineRadio2">Femme</label>
    </div>
    <div class="form-row align-items-center">
    <div class="col-auto my-1">
    <label for="profession">Profession:</label><br>
            <input list="prof" name="profession" value= <?php echo isset($_SESSION["profession"]) ? $_SESSION["profession"] : ''; ?>>
                <datalist id="prof">
                    <option value="Etudiant"></option>
                    <option value="Professeur"></option>
                </datalist>
    </div>
    <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="roleMembre">Rôle</label>
      <input type="text" class="form-control" name="roleMembre" id="roleMembre" placeholder="(exemple membres BDE)" value="" >
      <div class="valid-feedback">
        Valide
      </div>
    </div>

  <input class="btn btn-primary" type="submit" name="modifier"></input>
  
  <a type="button" class="btn btn-danger"  href="accueil.php" onclick="<?php session_destroy(); ?>">Deconnexion</a>
</form>
</div>

<script>
// script pour que certaine partie du formulaire soit nécessairement remplit avant de pouvoir confirmer (boostrap)
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>