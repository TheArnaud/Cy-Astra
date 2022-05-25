<?php
  session_start();
?>

<?php

  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
      
      $out = '
      <a type="button" class="btn btn-outline-light" href="modifierProfil.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg>
      </a>';
      $in ='
      <script>
      var el =document.getElementById("delete2");
      el.remove();
      </script>
      ';
  }else{
      $out = '';
      $in ='';
  }
?>

<?php
  try
  {
    // On établit la connection à MySQL et on active le détail des erreurs
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
    // En cas d'erreur, on affiche un message et on arrête tout
      die('Erreur : '.$e->getMessage());
  }

  //récupération des donnéés de la table galerie dans la database pour l'affichage des images
  $query = "SELECT * FROM galerie" or die(print_r($bdd->errorInfo()));
  $result=$bdd->query($query);
  $donnees = $result->fetchAll(\PDO::FETCH_ASSOC);
  for ($i=0; $i < 26; $i++) { 
    $tabImageSource[$i] = $donnees[$i]['imageSource'];
  }   
?>



<!DOCTYPE html>
<html>
<head>
    <title>CY Astra</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="styleGALERIE.css">

    <title>CY Astra</title>


    <script>
      //redirections
     function ToLogin() {
       window.location="login.html"
     } 
     function ToRegister() {
       window.location="register.html"
     }
    </script>

  
</head>



<body>
<!-- navbar -->
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
            <li class="nav-item">
              <a class="nav-link" href="#">Galerie</a>
            </li>
          </ul>
          <div class="btn-group" role="group" >
            <?php echo $out ?>

            <a type="button" class="btn btn-outline-light" href="panier.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewbox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
                  
                  Panier
            
            </a>

            <div class="btn-group" role="group" id="delete2">

              <?php echo $in ?>

              <button type="button" class="btn btn-outline-light " onclick="ToLogin()" >Connexion</button>
              <button type="button" class="btn btn-outline-light"  onclick="ToRegister()">Inscription</button>
          
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div class="row">
  <div class="column">  <!-- Mosaique d'images -->   <!-- colonne 1-->
    <img src="<?php echo $tabImageSource[0];?>">
    <img src="<?php echo $tabImageSource[1];?>">
    <img src="<?php echo $tabImageSource[2];?>">
    <img src="<?php echo $tabImageSource[3];?>">
    <img src="<?php echo $tabImageSource[4];?>">
    <img src="<?php echo $tabImageSource[5];?>">
    <img src="<?php echo $tabImageSource[6];?>">
  </div>
  <div class="column">
  <img src="<?php echo $tabImageSource[7];?>">      <!-- colonne 2-->
  <img src="<?php echo $tabImageSource[8];?>">
  <img src="<?php echo $tabImageSource[9];?>">
  <img src="<?php echo $tabImageSource[10];?>">
  <img src="<?php echo $tabImageSource[11];?>">
  <img src="<?php echo $tabImageSource[12];?>">
  </div>
  <div class="column">
    <img src="<?php echo $tabImageSource[13];?>">  <!-- colonne 3-->
    <img src="<?php echo $tabImageSource[14];?>">
    <img src="<?php echo $tabImageSource[15];?>">
    <img src="<?php echo $tabImageSource[16];?>">
    <img src="<?php echo $tabImageSource[17];?>">
    <img src="<?php echo $tabImageSource[18];?>">
    <img src="<?php echo $tabImageSource[19];?>">
  </div>
  <div class="column">
    <img src="<?php echo $tabImageSource[20];?>">    <!-- colonne 4-->
    <img src="<?php echo $tabImageSource[21];?>">
    <img src="<?php echo $tabImageSource[22];?>">
    <img src="<?php echo $tabImageSource[23];?>">
    <img src="<?php echo $tabImageSource[24];?>">
    <img src="<?php echo $tabImageSource[25];?>">
  </div>
</div>

  
</body>
</html>