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
    if(isset($_POST['ajouterArt1'])) {
        $_SESSION["id"] = 1;
        //Récupération data de la table boutique pour l'ajout d'articles au panier
        $query = "SELECT * FROM boutique WHERE id='{$_SESSION["id"]}'" or die(print_r($bdd->errorInfo()));
        $result=$bdd->query($query);
        $donnees = $result->fetch();

        if(isset($_SESSION["listePanier"])) {

            //on affecte à la liste $_SESSION["listePanierArticleId"] tous les articleId des articles déjà présents dans le panier
            $_SESSION["listePanierArticleId"] = array_column($_SESSION["listePanier"], "id");

                $nouvelArticlePanier = array(
                    'id' => $donnees['id'],
                    'Nom' => $donnees['Nom'],
                    'Prix' => $donnees['Prix'],
                    'Infos' => $donnees['Infos'],
                    'img' => $donnees['img'],
                );

                //incrementation et ajout du nouvel article à la fin de la liste du panier
                $_SESSION["listePanier"][$_SESSION['nbArticlesPanier']] = $nouvelArticlePanier;
                $_SESSION['nbArticlesPanier'] += 1;
        }
        else { //si aucun article n'est deja present dans le panier
            $nouvelArticlePanier = array(
                'id' => $donnees['id'],
                'Nom' => $donnees['Nom'],
                'Prix' => $donnees['Prix'],
                'Infos' => $donnees['Infos'],
                'img' => $donnees['img'],
            );

            //ajout du nouvel article au début de la liste du panier
            $_SESSION["listePanier"][0] = $nouvelArticlePanier;
            $_SESSION['nbArticlesPanier'] = 1;
        }
        header("Location:boutique.php");
        exit();
    }



    if(isset($_POST['ajouterArt2'])) {
        $_SESSION["id"] = 2;
        //Récupération data de la table boutique pour l'ajout d'articles au panier
        $query = "SELECT * FROM boutique WHERE id='{$_SESSION["id"]}'" or die(print_r($bdd->errorInfo()));
        $result=$bdd->query($query);
        $donnees = $result->fetch();

        if(isset($_SESSION["listePanier"])) {

            //on affecte à la liste $_SESSION["listePanierArticleId"] tous les articleId des articles déjà présents dans le panier
            $_SESSION["listePanierArticleId"] = array_column($_SESSION["listePanier"], "id");

            $nouvelArticlePanier = array(
                'id' => $donnees['id'],
                'Nom' => $donnees['Nom'],
                'Prix' => $donnees['Prix'],
                'Infos' => $donnees['Infos'],
                'img' => $donnees['img'],
            );

                //incrementation et ajout du nouvel article à la fin de la liste du panier
                $_SESSION["listePanier"][$_SESSION['nbArticlesPanier']] = $nouvelArticlePanier;
                $_SESSION['nbArticlesPanier'] += 1;
        }
        else { //si aucun article n'est deja present dans le panier
            $nouvelArticlePanier = array(
                'id' => $donnees['id'],
                'Nom' => $donnees['Nom'],
                'Prix' => $donnees['Prix'],
                'Infos' => $donnees['Infos'],
                'img' => $donnees['img'],
            );

            //ajout du nouvel article au début de la liste du panier
            $_SESSION["listePanier"][0] = $nouvelArticlePanier;
            $_SESSION['nbArticlesPanier'] = 1;
        } 
        header("Location:boutique.php");
        exit();
    }



    if(isset($_POST['ajouterArt3'])) {
        $_SESSION["id"] = 3;
        //Récupération data de la table boutique pour l'ajout d'articles au panier
        $query = "SELECT * FROM boutique WHERE id='{$_SESSION["id"]}'" or die(print_r($bdd->errorInfo()));
        $result=$bdd->query($query);
        $donnees = $result->fetch();
        
        if(isset($_SESSION["listePanier"])) {

            //on affecte à la liste $_SESSION["listePanierArticleId"] tous les articleId des articles déjà présents dans le panier
            $_SESSION["listePanierArticleId"] = array_column($_SESSION["listePanier"], "id");

                $nouvelArticlePanier = array(
                    'id' => $donnees['id'],
                    'Nom' => $donnees['Nom'],
                    'Prix' => $donnees['Prix'],
                    'Infos' => $donnees['Infos'],
                    'img' => $donnees['img'],
                );

                //incrementation et ajout du nouvel article à la fin de la liste du panier
                $_SESSION["listePanier"][$_SESSION['nbArticlesPanier']] = $nouvelArticlePanier;
                $_SESSION['nbArticlesPanier'] += 1;
        }
        else { //si aucun article n'est deja present dans le panier
            $nouvelArticlePanier = array(
                'id' => $donnees['id'],
                'Nom' => $donnees['Nom'],
                'Prix' => $donnees['Prix'],
                'Infos' => $donnees['Infos'],
                'img' => $donnees['img'],
            );

            //ajout du nouvel article au début de la liste du panier
            $_SESSION["listePanier"][0] = $nouvelArticlePanier;
            $_SESSION['nbArticlesPanier'] = 1;
        }
        header("Location:boutique.php");
        exit();
    }


    if(isset($_POST['ajouterArt4'])) {
        $_SESSION["id"] = 4;
        //Récupération data de la table boutique pour l'ajout d'articles au panier
        $query = "SELECT * FROM boutique WHERE id='{$_SESSION["id"]}'" or die(print_r($bdd->errorInfo()));
        $result=$bdd->query($query);
        $donnees = $result->fetch();

        if(isset($_SESSION["listePanier"])) {

            //on affecte à la liste $_SESSION["listePanierArticleId"] tous les articleId des articles déjà présents dans le panier
            $_SESSION["listePanierArticleId"] = array_column($_SESSION["listePanier"], "id");

                $nouvelArticlePanier = array(
                    'id' => $donnees['id'],
                    'Nom' => $donnees['Nom'],
                    'Prix' => $donnees['Prix'],
                    'Infos' => $donnees['Infos'],
                    'img' => $donnees['img'],
                );

                //incrementation et ajout du nouvel article à la fin de la liste du panier
                $_SESSION["listePanier"][$_SESSION['nbArticlesPanier']] = $nouvelArticlePanier;
                $_SESSION['nbArticlesPanier'] += 1;
        }
        else { //si aucun article n'est deja present dans le panier
            $nouvelArticlePanier = array(
                'id' => $donnees['id'],
                'Nom' => $donnees['Nom'],
                'Prix' => $donnees['Prix'],
                'Infos' => $donnees['Infos'],
                'img' => $donnees['img'],
            );

            //ajout du nouvel article au début de la liste du panier
            $_SESSION["listePanier"][0] = $nouvelArticlePanier;
            $_SESSION['nbArticlesPanier'] = 1;
        }
        header("Location:boutique.php");
        exit();
    }

    if(isset($_POST["suppPanier"])) {
        unset($_SESSION["listePanier"]);
        header("Location:panier.php");
        exit();
    }

    if(isset($_POST["validerCommande"])) {
        unset($_SESSION["listePanier"]);
        header("Location:boutique.php");
        exit();
    }

?>