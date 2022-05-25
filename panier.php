<?php
  session_start();

  if(isset($_SESSION['listePanier'])) {
    $listeNomArticlesPanier = array_column($_SESSION['listePanier'], 'Nom');
    $listePrixPanier = array_column($_SESSION['listePanier'], 'Prix');
    $listeReductionPanier = array_column($_SESSION['listePanier'], 'Infos');
    if (isset($listePrixPanier)) {
      $_SESSION['prixTotalPanier'] = 0; //variable contenant le prix total du panier
      for ($i = 0; $i < $_SESSION['nbArticlesPanier']; $i++) {
        $_SESSION['prixTotalPanier'] += intval($listePrixPanier[$i]); //- $listeReductionPanier[$i];
      }
    }
  }
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

<!DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="stylePANIER.css">

    <title>CY Astra</title>
    <script>
        function ValiderCommande() {
      
          window.location='payment.php?total='+"<?php echo $_SESSION['prixTotalPanier']?>"
        }
      </script>

    </head>


    <body>                                                                <!-- navbar-->
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


        <div class="container-fluid top">   <!-- Titre princial-->
            <div class="titre">
                <h1>
                  Panier
                </h1>
            </div>
         </div>

         

        <div class="final">
          <?php
            if(isset($_SESSION['listePanier'])) {
              echo("<h2 style='text-decoration: underline;'>Vos articles :</h2>");

              foreach($listeNomArticlesPanier as $char) {
                echo ("-". $char . "    x1 <br>");
              }
              echo ("
              <div class='total'>
              Total : " . $_SESSION['prixTotalPanier'] . "€
              </div>
              ");
            }
            else {
              echo "<h1 style='text-align:center;'>Panier vide<h1>";
            }
          ?>
        </div>

        <div class="btn-group GROUPE" role="group" id="group">
          <button class='btn btn-success' onclick= "ValiderCommande()">Payer</button>
          <a class='btn btn-primary' href="boutique.php"> Retour boutique </a>
          <form action='dbbBoutique.php' method='post'>
              <button type='submit' class='btn btn-danger' name='suppPanier' >Supprimer le panier</button>
            </form>
        </div>
         

<!-- script bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html> 