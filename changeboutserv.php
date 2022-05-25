
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
// On met a jour les élements de la database
  $_SESSION["Nom"] = $_POST['Nom'];
  $_SESSION["Prix"] = $_POST['Prix'];
  $_SESSION["img"] = 'images/boutique/'.$_POST['image'];
  $_SESSION["Infos"] = $_POST['Infos'];
  $id = $_POST['id'];

  $req = $bdd->prepare("UPDATE boutique
        SET Nom=:Nom, Prix=:Prix, img=:img, Infos=:Infos
        WHERE id=$id");
  $req->execute(array(
    'Nom' => $_SESSION["Nom"],
    'Infos' => $_SESSION["Infos"],
    'img' => $_SESSION["img"],
    'Prix' => $_SESSION["Prix"],
    ));

  header("Location:boutiqueadmin.php");
  exit();

?>


