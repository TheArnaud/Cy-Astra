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
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){

      $shesh = '
      <div id="snackbar">Insciption validée !    
    </div>';
      
  }else{
      $shesh = '<div id="snackbar" style="background-color: #fd0d0d; color:white;">Veuillez vous connecter    
      </div>';
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
?>

<?php 
  //EVENT 1
  $query= "SELECT * FROM events WHERE id = '1'";
  $result=$bdd->query($query);
  $data=$result->fetch();
  $nom1 = $data['Nom'];
  $desc1 = $data['Description'];
  $img1 = $data['img'];

  //EVENT 2
  $query= "SELECT * FROM events WHERE id = '2'";
  $result=$bdd->query($query);
  $data=$result->fetch();
  $nom2 = $data['Nom'];
  $desc2 = $data['Description'];
  $img2 = $data['img'];

  //EVENT 3
  $query= "SELECT * FROM events WHERE id = '3'";
  $result=$bdd->query($query);
  $data=$result->fetch();
  $nom3 = $data['Nom'];
  $desc3 = $data['Description'];
  $img3 = $data['img'];

  //EVENT 4
  $query= "SELECT * FROM events WHERE id = '4'";
  $result=$bdd->query($query);
  $data=$result->fetch();
  $nom4 = $data['Nom'];
  $desc4 = $data['Description'];
  $img4 = $data['img'];

  //EVENT 5
  $query= "SELECT * FROM events WHERE id = '5'";
  $result=$bdd->query($query);
  $data=$result->fetch();
  $nom5 = $data['Nom'];
  $desc5 = $data['Description'];
  $img5 = $data['img'];            
?>

<!DOCTYPE html>
<html>
<head>
    <title>CY Astra</title>

    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="styleEVENTS.css">

    <script>
      //Redirection vers login/register
      function ToLogin() {
        window.location="login.html"
      } 
      function ToRegister() {
        window.location="register.html"
      }
     </script>

<script>
     function Snackbar() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}</script>


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
              <a class="nav-link" href="galerie.php">Galerie</a  >
            </li>
              </ul>
              <div class="btn-group" role="group">

                <?php echo $out ?>

                <a type="button" class="btn btn-outline-light" href="panier.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewbox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg>
                  
                  Panier
            
                </a>
                <div class="btn-group" role="group" id="delete2">

                  <?php echo $in ?>

                  <button type="button" class="btn btn-outline-light" onclick="ToLogin()">Connexion</button>
                  <button type="button" class="btn btn-outline-light" onclick="ToRegister()">Inscription</button>
              
                </div>
              </div>
            </div>
          </div>
        </nav>

        <div class="container-fluid top"> <!-- Titre princpal -->
          <div class="titre">
            <h1>Événement</h1>
            <h3 style="color:rgb(238, 235, 235)">Venez vivre de magnifique expériences !</h3>
          </div>
        </div>

        <div class="info">               <!-- Info supplémentaire -->
          <h2 class="propos">Pour participer aux évenements</h2>
          <p  id="subtitle"> La plupart des évenements ne sont pas payants (sauf les voyages), ils sont payés par vos dons et vos achats dans le store. Pour les voyages en france, veuillez fournir une pièce d'identité valide. Pour les voyages à l'international, veuillez fournir un passeport en cours de validité. Les évenements ne sont en aucun cas garantis et sont sujets à l'annulation a tout momment.</p>
        </div>


        
          <div class="card mb-3" style="max-width: 170vh; max-height:25vh;">    <!-- event 1 -->
            <div class="row g-0">
              <div class="col-md-4 fill" >
              <img  src=<?php echo($img1)?>>                                     <!-- image de l'event 1 -->
              </div>
              <div class="col-md-8 ho">
                <div class="card-body">
                  <h5 class="card-title">
                  <?php echo($nom1)?>                                            <!-- Nom de l'event 1 -->
                  </h5>
                  <p class="card-text">
                  <?php echo($desc1)?>                                           <!-- Description event 1 --> -->
                  </p>
                  <p class="card-text"><small class="text-muted">Mis à jour le 27/05/2021</small></p>
                  <button type="button" class="btn btn-primary" onclick="Snackbar()" >S'inscrire</button>
                </div>
              </div>
            </div>
          </div>
  

          <div class="card mb-3" style="max-width: 170vh; max-height:25vh;">   <!-- event 2 -->
            <div class="row g-0">
              <div class="col-md-4 fill">
              <img  src=<?php echo($img2)?> alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">
                  <?php echo($nom2)?>
                  </h5>
                  <p class="card-text">
                  <?php echo($desc2)?>
                  </p>
                  <p class="card-text"><small class="text-muted">Mis à jour le 31/05/2021</small></p>
                  <a type="button" class="btn btn-primary" onclick="Snackbar()">S'inscrire</a>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-3" style="max-width: 170vh; max-height:25vh;">   <!-- event 3 -->
            <div class="row g-0">
              <div class="col-md-4 fill">
              <img  src=<?php echo($img3)?> alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">
                  <?php echo($nom3)?>
                  </h5>
                  <p class="card-text">
                  <?php echo($desc3)?>
                  </p>
                  <p class="card-text"><small class="text-muted">Mis à jour le 04/06/2021</small></p>
                  <button type="button" class="btn btn-primary" onclick="Snackbar()" >S'inscrire</button>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-3" style="max-width: 170vh; max-height:25vh;">   <!-- event 4 -->
            <div class="row g-0">
              <div class="col-md-4 fill">
              <img  src=<?php echo($img4)?> alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">
                  <?php echo($nom4)?>
                  </h5>
                  <p class="card-text">
                  <?php echo($desc4)?>
                  </p>
                  <p class="card-text"><small class="text-muted">Mis à jour le 04/06/2021</small></p>
                  <button type="button" class="btn btn-primary" onclick="Snackbar()" >S'inscrire</button>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-3" style="max-width: 170vh; max-height:25vh;">   <!-- event 5 -->
            <div class="row g-0">
              <div class="col-md-4 fill">
              <img  src=<?php echo($img5)?> alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">
                  <?php echo($nom5)?>
                  </h5>
                  <p class="card-text">
                  <?php echo($desc5)?>
                  </p>
                  <p class="card-text"><small class="text-muted">Mis à jour le 04/06/2021</small></p>
                  <button type="button" class="btn btn-primary" onclick="Snackbar()">S'inscrire</button>
                </div>
              </div>
            </div>
          </div>
          
        <!-- Alrte d'inscription bien réalisé ( snackbar)-->
          <?php echo $shesh ?>
        <!-- lien boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>



