<?php
try {
  //code...
  $bd = new PDO('mysql:host=localhost;dbname=lpig2_22mai;charset=utf8', 'root', '' );
} catch (Exception $e) {
  die('Impossible de se connecter a la BD: '.$e-> getMessage());
}
$resultat=$bdd->query('select * from etudiants');
echo '<a href="index.php">cliquer ici pour retourner au formulaire d\'insertion</a><br/>';
echo '<br/>';
echo ' <H3>CI-DESSOUS LE CONTENU DE LA BASE DE DONNEES  lpig2_22mai</H3> <br/>';

		$ordre=1;
		while($donnee = $resultat -> fetch()){ 
			
			echo 'Etudiant numéro: '.$ordre.'<br/>';
			echo 'Prenom : '.$donnee['prenom'].'<br/>'; 
			echo 'Nom : '.$donnee['nom'].'<br/>';
			echo 'Adresse : '.$donnee['adresse'].'<br/>';
			echo 'Téléphone : '.$donnee['telephone'].'<br/>';
			echo '*****************************//////**************************</br>';
			$ordre++;
		}	
		 //echo header('location:index.php');
		 echo '<a href="index.php">retour au formulaire</a>';

?>