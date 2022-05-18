<?php
	if(isset($_POST['id']) and isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['conf_pass']))//test l'existence des champs
	{
		$id = htmlentities($_POST['id']);
		$username = htmlentities($_POST['username']);
		$email = htmlentities($_POST['email']);	//on stocke les données recu
		$password = htmlentities($_POST['password']);
		$conf_mdp = htmlentities($_POST['conf_mdp']);
		if(empty($id) or empty($username) or empty($email) or empty($password) or empty($conf_pass))
		{
			echo 'Merci de remplir tous les champs';
		}
		else
		{
			include('connexion.php');
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=baby;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{

					die('Erreur : '.$e->getMessage());

			}
			
			$request ="INSERT INTO user(id, username, email, password, conf_pass) 
			           VALUES ('".$id."', '".$username."', '".$email."', '".$password."', '".$conf_pass."')";

			$reponse = $bdd->exec($request);

			if($reponse == 0){
				echo 'rien n\'est insérer';
			}
			else
			{
				echo 'Success <br>';
			
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
		echo 'Merci de remplir tous les champs'; 
	}
	?>
