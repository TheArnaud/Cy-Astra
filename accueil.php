<?php
    session_start();  //on commence toujours pas commencer la session
    ?>

<?php                                                                         // script php qui permet d'afficher le logo profil si on est connecter , affiche les boutons connexion/inscription sinon

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){       // supervariable en PHP ($_SESSION) qui nous permet de savoir si quelqu'un c'est bien login
       
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

?>


<!DOCTYPE html>
<html>
<head>
    <title>CY Astra</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>CY Astra</title>


    <script>                              //script pour redigier vers la page d'inscription et de connexion
     function ToLogin() {
       window.location="login.html"
     } 
     function ToRegister() {
       window.location="register.html"
     }
    </script>

  
</head>

<!--  -->

<body>

  <nav class="navbar sticky-top navbar-expand-lg navbar-custom">    <!-- barre de naviguation (Navbar) de boostrap  -->
    <div class="container-fluid">
      <a class="navbar-brand" style="color:white;font-size:35px" href="#">CY ASTRA</a>
        <button class="navbar-toggler ml-auto custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="text-align:center">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="boutique.php">Boutique</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="events.php">Événement</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#ABOUT">À propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="galerie.php">Galerie</a  >
            </li>
          </ul>
          <div class="btn-group" role="group" >
          
            <?php echo $out ?>

            <a type="button" class="btn btn-outline-light" href="panier.php">   <!-- boutons et logo   -->
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewbox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
                  
                  Panier
            
            </a>

            <div class="btn-group" role="group" id="delete2">

              <?php echo $in ?>
<!-- bouton s'enregistrer, se connecter -->
              <button type="button" class="btn btn-outline-light " onclick="ToLogin()" >Connexion</button>
              <button type="button" class="btn btn-outline-light"  onclick="ToRegister()">Inscription</button>
          
            </div>
          </div>
        </div>
      </div>
    </nav>
<!-- titre -->
    <div class="container-fluid top">
      <div class="titre">
        <h1>CY-ASTRA Vous souhaite la bienvenue</h1>
        <h2 style="color:rgb(238, 235, 235)">Le club d'astronomie de CY Tech</h2>
      </div>
    </div>
<!-- a propos -->
    <div class="row ABOUT" id="ABOUT">
        <div class="col-md-8 aboutLEFT"></div>
        <div class="col-md-4 aboutRIGHT">
            <h2 class="propos">À propos de nous</h2>
            <p>Un club autour de l’espace unique en son genre...

Tout a commencé avec un groupe d’amis qui partagent une même passion, et qui se sont réunis de plus en plus souvent pour en profiter tous ensemble. Très vite, à travers nos réseaux sociaux nous avons commencé à organiser des sorties de nuit pour admirer les étoiles.
Puis, voyant qu’un grand nombre de personnes étaient sensibles à cet univers, nous nous réjouissons de pouvoir transmettre notre amour de l'astronomie.
Nous avons donc décidé de sauter le pas et grâce au cadre qu’offre CYTech, nous avons pu fonder en 2021 notre association étudiante: CY-Astra, composée d’individus enthousiastes qui aiment partager leurs idées aussi bien que les activités.

Vous pouvez parcourir notre site pour en savoir plus, et si ce que nous faisons vous intéresse, n’hésitez pas à nous contacter.
            </p>
        </div>
    </div>
<!-- div des evenements -->
    <h1 class="eventTitle">Événement à venir</h1>
    <div class="TEST">
    <div class="card-group Event">
      <!-- event 3 -->
          <div class="card border-dark" style="width: 18rem;">
              <img src=<?php echo $img1?> class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $nom1 ?></h5>
                <p class="card-text"><?php echo $desc1 ?></p>
                <a href="events.php" class="btn btn-primary">S'inscrire</a>
                <p class="card-text"><small class="text-muted">Mis à jour le 27/05/2021</small></p>
          </div>
           
      </div>
      <!-- event 2 -->
         <div class="card border-dark " style="width: 18rem;">
              <img src=<?php echo $img2?> class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $nom2?></h5>
                <p class="card-text"> <?php echo $desc2?></p>
                <a href="events.php" class="btn btn-primary">S'inscrire</a>
                <p class="card-text"><small class="text-muted">Mis à jour le 31/05/2021</small></p>
            </div>  
      </div>
      <!-- event 3 -->
          <div class="card  border-dark" style="width: 18rem;">
              <img src=<?php echo $img3?> class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $nom3?></h5>
                <p class="card-text"><?php echo $desc3?></p>
                <a href="events.php" class="btn btn-primary">S'inscrire</a>
                <p class="card-text"><small class="text-muted">Mis à jour le 04/06/2021</small></p>
            </div>  
      </div>  
    </div>
  </div>
<!--  onglet 'nous contacter'-->
    <div class="row CONTACT">
      <div class="col-md-4 contactLEFT">
        <h2 class="propos">Nous contacter</h2>
        <p>Avenue du Parc, 95000 Cergy, France</p><!-- Adresse -->
        <p>cyastra@gmail.com</p>
        <p>07 76 06 46 14</p>
        <p>
          <a role="button" class="btn btn-primary" href="https://www.facebook.com/NASA"><!-- lien FB -->
            <svg  width="16" height="16" fill="currentColor" class="bi bi-facebook" viewbox="0 0 16 16"><!-- logos FB -->
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
          </svg></a>

          <a role="button" class="btn btn-primary" href="https://twitter.com/nasa"><!-- lien twitter -->
            <svg width="16" height="16" fill="currentColor" class="bi bi-twitter" viewbox="0 0 16 16"><!-- logos twitter -->
            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg></a>
        </p>
      </div>
      <div class="col-md-8 contactRIGHT"></div>
  </div>
    

<!-- lien boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
