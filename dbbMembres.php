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
	if(isset($_POST['enregistrer'])) {	//si le formulaire "enregistrer" a été envoyé
		$_SESSION["pseudonyme"] = $_POST['pseudo'];
		$_SESSION["email"] = $_POST['email'];
		$_SESSION["motdepasse"] = $_POST['password'];
		$_SESSION["adresse"] = $_POST['adresse'];
		
		//Préparation de requête pour insérer les informations dans la table "membres" de la database
		$req = $bdd->prepare('INSERT INTO membres(pseudonyme, email, motdepasse, adresse) VALUES(:pseudonyme, :email, :motdepasse, :adresse)') 
					or die(print_r($bdd->errorInfo()));
		$req->execute(array(
			'pseudonyme' => $_SESSION["pseudonyme"],
			'email' => $_SESSION["email"],
			'motdepasse' => $_SESSION["motdepasse"],
			'adresse' => $_SESSION["adresse"],
			));

		//Recuperation de membreId: l'id de l''utilisateur
		// on definit la requête MySQL
		$query = "SELECT membreId FROM membres WHERE pseudonyme= '{$_SESSION["pseudonyme"]}'";
		//on affecte le resultat a une variable
		$result = $bdd->query($query);
		//on recupere le resultat avec fetch tableau associatif
		$row = $result->fetch();
		$_SESSION["membreId"] = $row['membreId'];
		
		//l'utilisateur est désormais connecté
		$_SESSION["logged_in"] = true;

		//redirection vers la page d'accueil
		header("Location:accueil.php");
		exit();
	}


	if(isset($_POST['modifier'])) {
		

		$query = "SELECT membreId FROM membres WHERE pseudonyme= '{$_POST["pseudo"]}' AND motdepasse ='{$_POST["password"]}'";
		$result = $bdd->query($query);
		$data = $result->fetch();
		$membreId = $data[0];
		$_SESSION["nom"] = $_POST['nom'];
		$_SESSION["dateNaissance"] = $_POST['dateNaissance'];
		$_SESSION["pseudonyme"] = $_POST['pseudo'];


		$_SESSION["email"] = $_POST['email'];
		$_SESSION["motdepasse"] = $_POST['password'];
		$_SESSION["adresse"] = $_POST['adresse'];

		if (isset($_POST['sexe'])){
			$_SESSION["sexe"] = $_POST['sexe'];
		}

		$_SESSION["profession"] = $_POST['profession'];
		$_SESSION["ville"] = $_POST['ville'];
		$_SESSION["roleMembre"] = $_POST['roleMembre'];
		//Preparation de requête UPDATE pour modifier ou ajouter les informations entrées par l''utilisateur
		$req = $bdd->prepare("UPDATE membres
					SET nom=:nom, dateNaissance=:dateNaissance, pseudonyme=:pseudonyme, email=:email, motdepasse=:motdepasse, adresse=:adresse, sexe=:sexe, profession=:profession, ville=:ville, roleMembre=:roleMembre
					WHERE membreId='{$membreId}'") or die(print_r($bdd->errorInfo()));
		$req->execute(array(
			'nom' => $_SESSION["nom"],
			'dateNaissance' => $_SESSION["dateNaissance"],
			'pseudonyme' => $_SESSION["pseudonyme"],
			'email' => $_SESSION["email"],
			'motdepasse' => $_SESSION["motdepasse"],
			'adresse' => $_SESSION["adresse"],
			'sexe' => $_SESSION["sexe"],
			'profession' => $_SESSION["profession"],
			'ville' => $_SESSION["ville"],
			'roleMembre' => $_SESSION["roleMembre"],
			));
			$_SESSION["logged_in"] = true;
		//redirection vers la page d'accueil
		header("Location:accueil.php");
		exit();
	}



	if(isset($_POST['connexion'])) {
		$pseudo = $_POST['pseudo'];
		$mdp = $_POST['password'];
		
		
		
			$query = "SELECT * FROM membres WHERE pseudonyme = '$pseudo' AND motdepasse='$mdp' " or die(print_r($bdd->errorInfo()));
			$result=$bdd->query($query);
			$donnees = $result->fetch();
			
			if ($donnees) { //on verifie que $donnees contient des donnees. Si oui, alors l'utilisateur possede un compte et peut se connecter. 
				echo "	data existe";
				$_SESSION["membreId"] = $donnees['membreId'];
				$_SESSION["nom"] = $donnees['nom'];
				$_SESSION["dateNaissance"] = $donnees['dateNaissance'];
				$_SESSION["pseudonyme"] = $donnees['pseudonyme'];
				$_SESSION["email"] = $donnees['email'];
				$_SESSION["motdepasse"] = $donnees['motdepasse'];
				$_SESSION["adresse"] = $donnees['adresse'];
				$_SESSION["sexe"] = $donnees['sexe'];
				$_SESSION["profession"] = $donnees['profession'];
				$_SESSION["ville"] = $donnees['ville'];
				$_SESSION["roleMembre"] = $donnees['roleMembre'];

				//l'utilisateur est désormais connecté
				$_SESSION["logged_in"] = true;
			}
			else{ //aucune data correspondante dans la database
				echo "Pseudonyme ou Mot de passe incorrect";
			}
		
		
		
		//redirection vers la page d'accueil
		header("Location:accueil.php");
		exit();
	}
	
?>



