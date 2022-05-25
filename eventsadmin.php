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


<html>
    <head>
    <meta charset="utf-8"> <!--Charset-->
        <meta name="viewport" content="width=device-width, initial-scale=1"><!--Pour utiliser sur mobile-->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> <!--Bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

        <script>
          //Redirection vers changeevent.php et ajoute des paramètres
            function Change1() {
                window.location="changeevent.php?id="+1+"&Nom=<?php echo $nom1?>&Description=<?php echo $desc1?>&img=<?php echo $img1?>"
            }

            function Change2() {
                window.location="changeevent.php?id="+2+"&Nom=<?php echo $nom2?>&Description=<?php echo $desc2?>&img=<?php echo $img2?>"
            }

            function Change3() {
                window.location="changeevent.php?id="+3+"&Nom=<?php echo $nom3?>&Description=<?php echo $desc3?>&img=<?php echo $img3?>"
            }
            function Change4() {
                window.location="changeevent.php?id="+4+"&Nom=<?php echo $nom4?>&Description=<?php echo $desc4?>&img=<?php echo $img4?>"
            }
            function Change5() {
                window.location="changeevent.php?id="+5+"&Nom=<?php echo $nom5?>&Description=<?php echo $desc5?>&img=<?php echo $img5?>"
            }
        </script>

      
    </head>
<body>
<br>
<br>
<br>
<h2>MODIFIER LES EVENEMENTS :</h1>
<br>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Image source</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <!-- events -->
      <th scope="row">1</th>
      <td><?php echo($nom1)?></td>
      <td><?php echo($desc1)?></td>
      <td><?php echo($img1)?></td>
      <td><button onclick=Change1() class="btn btn-secondary" value="Modifier">Modifier</button></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><?php echo($nom2)?></td>
      <td><?php echo($desc2)?></td>
      <td><?php echo($img2)?></td>
      <td><button onclick=Change2() class="btn btn-secondary" value="Modifier">Modifier</button></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td><?php echo($nom3)?></td>
      <td><?php echo($desc3)?></td>
      <td><?php echo($img3)?></td>
      <td><button onclick=Change3() class="btn btn-secondary" value="Modifier">Modifier</button></td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td><?php echo($nom4)?></td>
      <td><?php echo($desc4)?></td>
      <td><?php echo($img4)?></td>
      <td><button onclick=Change4() class="btn btn-secondary" value="Modifier">Modifier</button></td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td><?php echo($nom5)?></td>
      <td><?php echo($desc5)?></td>
      <td><?php echo($img5)?></td>
      <td><button onclick=Change5() class="btn btn-secondary" value="Modifier">Modifier</button></td>
    </tr>
  </tbody>
</table>

<button class="btn btn-secondary" onclick="window.location = 'events.php'">Voir les évenements</button>
</body>

</html>