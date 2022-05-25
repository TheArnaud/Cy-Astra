<?php
  session_start();
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


<html>
    <head>
    <meta charset="utf-8"> <!--Charset-->
        <meta name="viewport" content="width=device-width, initial-scale=1"><!--Pour utiliser sur mobile-->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> <!--Bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

        <script>
          //Redirections vers le changement server, en injectant les paramètres
            function Change1() {
                window.location="changebout.php?id="+1+"&Nom=<?php echo $nom1?>&prix=<?php echo $prix1?>&img=<?php echo $img1?>&infos=<?php echo $info1?>"
            }

            function Change2() {
                window.location="changebout.php?id="+2+"&Nom=<?php echo $nom2?>&prix=<?php echo $prix2?>&img=<?php echo $img2?>&infos=<?php echo $info2?>"
            }

            function Change3() {
                window.location="changebout.php?id="+3+"&Nom=<?php echo $nom3?>&prix=<?php echo $prix3?>&img=<?php echo $img3?>&infos=<?php echo $info3?>"
            }

            function Change4() {
                window.location="changebout.php?id="+4+"&Nom=<?php echo $nom4?>&prix=<?php echo $prix4?>&img=<?php echo $img4?>&infos=<?php echo $info4?>"
            }
        </script>
    </head>
<body>
<h2>Modifier les items de la boutique</h2>
<br>
<!-- Table des items -->
<table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Infos</th>
      <th scope="col">Image source</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo($nom1)?></td>
      <td><?php echo($prix1)?></td>
      <td><?php echo($info1)?></td>
      <td><?php echo($img1)?></td>
      <td><button onclick=Change1() class="btn btn-secondary">Modifier</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><?php echo($nom2)?></td>
      <td><?php echo($prix2)?></td>
      <td><?php echo($info2)?></td>
      <td><?php echo($img2)?></td>
      <td><button onclick=Change2() class="btn btn-secondary">Modifier</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td><?php echo($nom3)?></td>
      <td><?php echo($prix3)?></td>
      <td><?php echo($info3)?></td>
      <td><?php echo($img3)?></td>
      <td><button onclick=Change3() class="btn btn-secondary">Modifier</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td><?php echo($nom4)?></td>
      <td><?php echo($prix4)?></td>
      <td><?php echo($info4)?></td>
      <td><?php echo($img4)?></td>
      <td><button onclick=Change4() class="btn btn-secondary">Modifier</td>
    </tr>
  </tbody>
</table>
<!-- redirection vers boutique -->
<button class="btn btn-secondary" onclick="window.location = 'boutique.php'">Voir la boutique</button>
</body>

</html>