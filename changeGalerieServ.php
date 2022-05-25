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
?>

<?php
 //Modifie l'image dans database en fonction de son ID
    $_SESSION["imageId"] = $_POST['imageId'] + 1;
    $_SESSION["imageSource"] = 'images/gallerie/'.$_POST['imageSource'];
    //requete preparee
    $req = $bdd->prepare("UPDATE galerie SET imageSource=:imageSource WHERE imageId='{$_SESSION["imageId"]}'");
    $req->execute(array(
			'imageSource' => $_SESSION["imageSource"],
			));

    header("Location:galerieadmin.php"); //redirection vers le panel admin de la galerie
    exit();

?>
