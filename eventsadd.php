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
// Ajoute l'event dans la DB
    if (isset($_POST['eventAdd'])){
		
        $_SESSION["Nom"] = $_POST['Nom'];
        $_SESSION['Description'] = $_POST['Description'];
        $_SESSION['img'] = $_POST['image'];
        $req = $bdd->prepare('INSERT INTO events(Nom,Description,img) VALUES(:Nom, :Description, :img)')
            or die(print_r($bdd->errorInfo()));
        $req->execute(array(
			'Nom' => $_SESSION["Nom"],
			'Description' => $_SESSION["Description"],
			'img' => $_SESSION["img"],
			));
    }
        exit()



?>

