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

$query = "SELECT * FROM admins WHERE motdepasse='{$_POST["motdepasse"]}'" or die(print_r($bdd->errorInfo()));
			$result=$bdd->query($query);
			$donnees = $result->fetch();
			
			if ($donnees) { //on verifie que $donnees contient des donnees. Si oui, alors l'utilisateur possede un compte et peut se connecter. 
				
				$_SESSION["id"] = $donnees['id'];
                
                $_SESSION["motdepasse"] = $donnees['motdepasse'];
                $_SESSION["droits"] = $donnees['droits'];
				// Redirection en fonction des droits de l'admin
				if ($donnees['droits'] === 's' ) {
                    header("Location:boutiqueadmin.php");
					exit();
                }
                elseif ($donnees['droits'] === 'e' ) {
                    header("Location:eventsadmin.php");
					exit();
                }
                elseif ($donnees['droits'] === 'm' ) {
                    header("Location:adminmembres.php");
                }
                elseif ($donnees['droits'] === 'a' ) {
                    header("Location:adminmain.html");
                }
				elseif ($donnees['droits'] === 'g' ) {
                    header("Location:galerieadmin.php");
                }


			}
			else{
				echo "Pseudonyme ou Mot de passe incorrect";
			}
			
			?>