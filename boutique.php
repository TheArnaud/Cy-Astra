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
?>

<?php 
  //recuperation de la base de donnees et affectation a de nnouvelles variables
  //ITEM 1
  $query= "SELECT * FROM boutique WHERE id = '1'";
  $result=$bdd->query($query);
  $data=$result->fetch();
  $nom1 = $data['Nom'];
  $prix1 = $data['Prix'];
  $info1 = $data['Infos'];
  $img1 = $data['img'];

  //ITEM 2
  $query= "SELECT * FROM boutique WHERE id = '2'";
  $result=$bdd->query($query);
  $data=$result->fetch();
  $nom2 = $data['Nom'];
  $prix2 = $data['Prix'];
  $info2 = $data['Infos'];
  $img2 = $data['img'];

  //ITEM 3
  $query= "SELECT * FROM boutique WHERE id = '3'";
  $result=$bdd->query($query);
  $data=$result->fetch();
  $nom3 = $data['Nom'];
  $prix3 = $data['Prix'];
  $info3 = $data['Infos'];
  $img3 = $data['img'];

  //ITEM 4
  $query= "SELECT * FROM boutique WHERE id = '4'";
  $result=$bdd->query($query);
  $data=$result->fetch();
  $nom4 = $data['Nom'];
  $prix4 = $data['Prix'];
  $info4 = $data['Infos'];
  $img4 = $data['img'];           
?>


<!DOCTYPE html>
<html>
<head>
    <title>CY Astra</title>

    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="styleBOUTIQUE.css">

    <script>
      function ToLogin() {
        window.location="login.html"
      } 
      function ToRegister() {
        window.location="register.html"
      }
     </script>

     <script>                           // scipt de la snackbar pour afficher des alerts en bas de page lors d'un ajout au panier
     function Snackbar(article) {
      // Obtenir la Snackbar DIV
      var x = document.getElementById("snackbar");

      // Ajouter la classe "show" au DIV
      x.className = "show";

      //Apres 3 secondes, enlever la classe show du DIV
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
     }
     </script>



     <script>
  function info() { // modifier les informations de la page en fonction de 'nouveau' ou 'soldes'
    //prends les infos
    var info1 = "<?php echo $info1?>";
    var info2 = "<?php echo $info2?>";
    var info3 = "<?php echo $info3?>";
    var info4 = "<?php echo $info4?>";
    //Si on a une solde :
    if (info1.includes("Solde")) {
      info1=info1.replace("Solde","")
      info1=info1.replace("-","")
      info1=info1.replace("%","")
      // on formate la solde
      
      var pourc = parseInt(info1)/100;
      var old = '<?php echo $prix1 ?>';
      var newp = parseInt(old) - parseInt(old)*pourc;
      //on applique la solde
      // On affiche la solde
      document.getElementById('prix1').innerHTML = '<del>'+old+'</del>  '+newp+'€';
      document.getElementById('infos1').className = 'badge rounded-pill bg-danger';
      
      
    }
    // Si 'nouveau'
    if (info1.includes('Nouveau')){
      //On affiche nouveau
      document.getElementById('infos1').className = 'badge rounded-pill bg-success'



    }
    //IDEM
    if (info2.includes("Solde")) {
      info2=info2.replace("Solde","").replace("-","").replace("%","")
      var pourc = parseInt(info2)/100;
      var old = '<?php echo $prix2 ?>';
      var newp = parseInt(old) - parseInt(old)*pourc;
      
      document.getElementById('prix2').innerHTML = '<del>'+old+'</del>  '+newp+'€'
      document.getElementById('infos2').className = 'badge rounded-pill bg-danger';
      
      
    }
    if (info2.includes('Nouveau')){
      document.getElementById('infos2').className = 'badge rounded-pill bg-success'
      document.getElementById('prix2').innerHTML = old;


    }
    //IDEM
    if (info3.includes("Solde")) {
      info3=info3.replace("Solde","").replace("-","").replace("%","")
  
      
      var pourc = parseInt(info3)/100;
      var old = '<?php echo $prix3 ?>';
      var newp = parseInt(old) - parseInt(old)*pourc;
      
      document.getElementById('prix3').innerHTML = '<del>'+old+'</del>  '+newp+'€'
      document.getElementById('infos3').className = 'badge rounded-pill bg-danger';
      
      
    }
    if (info3.includes('Nouveau')){
      document.getElementById('infos3').className = 'badge rounded-pill bg-success'
      document.getElementById('prix3').innerHTML =  '<?php echo $prix3 ?>';


    }
    //IDEM
    if (info4.includes("Solde")) {
      info4=info4.replace("Solde","").replace("-","").replace("%","")
      
      
      var pourc = parseInt(info4)/100;
      var old = '<?php echo $prix4 ?>';
      var newp = parseInt(old) - parseInt(old)*pourc;
      
      document.getElementById('prix4').innerHTML = '<del>'+old+'</del>  '+newp+'€'
      document.getElementById('infos4').className = 'badge rounded-pill bg-danger';
      
      
    }
    if (info4.includes('Nouveau')){
      document.getElementById('infos4').className = 'badge rounded-pill bg-success'
      document.getElementById('prix4').innerHTML =  '<?php echo $prix4 ?>';


    }
    }
    

</script>
</head>

<body onload="info()">      <!-- navbar -->
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
                  <a class="nav-link" href="#">Boutique</a>
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
      <!-- titre principal -->
        <div class="container-fluid top">
          <div class="titre">
            <h1>Boutique</h1>
            <h3 style="color:rgb(238, 235, 235)">Supporter votre club préféré !</h3>
          </div>
        </div>
        
<!-- Cartes des produits -->
        <div class="row row-col s-1 row-cols-md-3 g-4">   <!-- Produit 1  -->
          <div class="col">
            <div class="card h-90  text-center">
              <img src=<?php echo($img1) ?> class="card-img-top" alt="..."> <!-- image -->
              <div class="card-body">
                <h5 class="card-title"><?php echo($nom1) ?></h5> <!-- nom -->
                <p class="card-text"><span id="prix1"></span>
                  <span  id="infos1"><?php echo $info1 ?></span><!-- infos -->
                </p>
                <form action="dbbBoutique.php" method="post">
                  <input class="btn btn-primary" type="submit" onclick="Snackbar()" name="ajouterArt1" value="Ajouter au panier">
                </form >
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-90  text-center">           <!-- Produit 2 -->
              <img src=<?php echo($img2) ?>  class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo($nom2) ?></h5>
                <p class="card-text"><span id=prix2></span>
                <span  id="infos2"><?php echo $info2 ?></span>
                </p>
                <form action="dbbBoutique.php" method="post">
                  <input class="btn btn-primary" type="submit" onclick="Snackbar()" name="ajouterArt2" value="Ajouter au panier">
                </form >
              </div>
            </div>
          </div>
          <div class="col">                                 <!-- Produit 3 -->
            <div class="card h-90 text-center border-light">
              <img src=<?php echo($img3) ?>  class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo($nom3) ?></h5>
                <p class="card-text"><span id="prix3">test</span>
                  <span id="infos3"><?php echo($info3) ?></span>
                </p>
                <form action="dbbBoutique.php" method="post">
                  <input class="btn btn-primary" type="submit" onclick="Snackbar()" name="ajouterArt3" value="Ajouter au panier">
                </form >
              </div>
            </div>
          </div>
          <div class="col">                                <!-- Produit 4 -->
            <div class="card h-90  text-center">
              <img src=<?php echo($img4) ?>  class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo($nom4) ?></h5>
                <p class="card-text"><span id="prix4"></span>
                  <span id="infos4"><?php echo($info4) ?></span>
                </p>
                <form action="dbbBoutique.php" method="post">
                  <input class="btn btn-primary" type="submit" onclick="Snackbar()" name="ajouterArt4" value="Ajouter au panier">
                </form >
              </div>
            </div>
          </div>
        </div>

        <!-- Snackbar, alerte et animation de chargement pour l'ajout dans le panier mais n'est pas visible a cause de la redirection du form , bug à corriger si temps-->        <div id="snackbar">Ajout au panier...    
          <div class="spinner-border spinner-border-sm" role="status">
            <span class="visually-hidden"></span>
          </div>
        </div>
     





<!-- lien bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>