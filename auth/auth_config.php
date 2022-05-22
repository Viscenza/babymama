<!-- cote serveur de la page create_question -->

<?php
include '../config.php';
    
/*Lorsque la requete est passer */
if (isset($_POST['sub'])) 
    {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
}
else {
    echo "Veuillez remplir tous les champs";
}


$req = $bd->exec("INSERT INTO `users` (`nom`, `prenom`, `adresse_mail`, `user_name`, `password`) VALUES ('$nom', '$prenom', '$username', '$email', '$password')");
if ($req) {
    echo "<script>
        window.location.href=' ../index.html';
    </script>";
}
else {
    echo 'Error!';
}
?>