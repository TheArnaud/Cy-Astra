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

<!---On récupère le contenu du formulaire et on ajoute l'utilisateur à la base de données -->
<?php 
		$_SESSION["pseudonyme"] = $_POST["pseudonyme"];
	
		$_SESSION["motdepasse"] = $_POST["motdepasse"];

        $_SESSION["droits"] = $_POST["droits"];
		
		//Préparation de requête pour insérer les informations dans la table "membres" de la database
		$req = $bdd->prepare('INSERT INTO admins(pseudonyme, motdepasse, droits) VALUES(:pseudonyme, :motdepasse,:droits)

		') 
					or die(print_r($bdd->errorInfo()));
		$req->execute(array(
			'pseudonyme' => $_SESSION["pseudonyme"],
			
			'motdepasse' => $_SESSION["motdepasse"],

            'droits' => $_SESSION["droits"],
			
			));


        //Recuperation de membreId: l'id de l''utilisateur
		// on definit la requête MySQL
		$query = "SELECT id FROM admins WHERE pseudonyme= '{$_SESSION["pseudonyme"]}'";
		//on affecte le resultat a une variable
		$result = $bdd->query($query);
		//on recupere le resultat avec fetch tableau associatif
		$row = $result->fetch();
		$_SESSION["membreId"] = $row['membreId'];

	
			
		header("Location:http://localhost/projet_final/adminADD.html");
		exit();
        
	?>