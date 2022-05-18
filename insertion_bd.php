<?php
	if(isset($_POST['id']) and isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['conf_pass']))//test l'existence des champs
	{
		$id = htmlentities($_POST['id']);
		$username = htmlentities($_POST['username']);
		$email = htmlentities($_POST['email']);	//on stocke les données recu
		$password = htmlentities($_POST['password']);
		$conf_mdp = htmlentities($_POST['conf_mdp']);
		if(empty($id) or empty($username) or empty($email) or empty($password) or empty($conf_pass))//on verifie si les variables sont bien remplis
		{
			echo 'Merci de remplir tous les champs'; //msg quand les variables sont vides
		}
		else
		{
			include('connexion.php');
      // connexion à la base de donnee et table
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=baby;charset=utf8', 'root', ''); // On se connecte à MySQL
			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout

					die('Erreur : '.$e->getMessage());

			}
			
			$request ="INSERT INTO user(id, username, email, password, conf_pass) 
			           VALUES ('".$id."', '".$username."', '".$email."', '".$password."', '".$conf_pass."')";//requete a executer

			$reponse = $bdd->exec($request);//execution de la requete

			if($reponse == 0){
				echo 'rien n\'est insérer';//resultat de l'execution si ca n'a pas fonctionner
			}
			else
			{
				echo 'Success <br>';//resultat si la requete a fonctionner
			
				echo $id.'<br>';
				echo $username.'<br>';
				echo $email.'<br>';
				echo $password.'<br>';
				echo $conf_pass.'<br>';
				echo header("location:affichage_bd.php");
				echo '<a href="formulaire_insert.php">Cliquer pour retourner au formulaire</a>';
			}
		}
	}
	else
	{
		echo 'Merci de remplir tous les champs'; //msg quand un des champs du premier formulaire n'existe pas
	}
	?>