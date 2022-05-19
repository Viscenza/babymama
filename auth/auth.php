<!-- cote serveur de la page create_question -->

<?php

    /* importation du fichier de connexion vers la base de
     Donnee */
    include '../config.php';
    
    /*Lorsque la requete est passer */
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) 
        {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
    }
    else {
        echo "Veuillez remplir tous les champs";
    }


    $req = $bd->exec("INSERT INTO `users` (`nom`, `prenom`, `adresse_mail`, `user_name`, `password`) VALUES ('$nom', '$prenom', '$email', '$username', '$password');");
    if ($req) {
        echo "C'est enregistrer";
    }
    else {
        echo 'Error!';
    }
?>