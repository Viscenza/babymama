<!-- cote serveur de la page create_question -->

<?php

    /* importation du fichier de connexion vers la base de
     Donnee */
    include 'config.php';
    
    /*Lorsque la requete est passer */
    if (isset($_POST['title']) && isset($_POST['text']) && isset($_POST['cat'])) 
        {
        $title = htmlspecialchars($_POST['title']);
        $text = htmlspecialchars($_POST['text']);
        $category = htmlspecialchars($_POST['cat']);

    }
    else {
        echo "Veuillez remplir tous les champs";
    }


    $req = $bd->exec("INSERT INTO `questions` (`title_question`, `text_question`, `cat_question`) VALUES ('$title', '$text', '$category')");
    if ($req) {
        header('Location: display_questions.php');
    }
    else {
        echo 'Error!';
    }
?>