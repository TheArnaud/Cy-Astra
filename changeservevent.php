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
//Modifie les evenements dans la DBB
  $_SESSION["Nom"] = $_POST['Nom'];
  $_SESSION["Description"] = $_POST['Description'];
  $_SESSION["img"] = 'images/'.$_POST['image'];
  $_SESSION['id'] = $_POST['id'];
  $id = $_SESSION['id'];
  $req = $bdd->prepare("UPDATE events
        SET Nom=:Nom, Description=:Description, img=:img
        WHERE id=$id");
  $req->execute(array(
    'Nom' => $_SESSION["Nom"],
    'Description' => $_SESSION["Description"],
          'img' => $_SESSION["img"],

    ));

  header("Location:eventsadmin.php");
  exit();
?>
