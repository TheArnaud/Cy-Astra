<?php
  session_start();
  
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


<html>
  <head>
  <meta charset="utf-8"> <!--Charset-->
      <meta name="viewport" content="width=device-width, initial-scale=1"><!--Pour utiliser sur mobile-->
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> <!--Bootstrap-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      <script>
        //redirections
          function Change(index) {
            window.location="changeGalerie.php?imageId="+index
          }
      </script>
  </head>
  <body>
    <h2>Modifier les images de la galerie</h2>
    <br>
    <!-- aller a la galerie -->
    <button onclick="window.location ='galerie.php'">Aller à la galerie</button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">imageSource</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <!-- affiche tous les images -->
        <?php for ($i=0; $i < 26; $i++): ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $tabImageSource[$i];?></td>
            <td><button onclick="Change('<?php echo $i;?>')" class="btn btn-secondary"></td>
          </tr>
        <?php endfor;?>
      </tbody>
    </table>
  </body>
</html>