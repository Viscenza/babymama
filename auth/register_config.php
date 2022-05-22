<!-- cote serveur de la page auth-->

<?php
    /* importation du fichier de connexion vers la base de
     Donnee */
        include '../config.php';

session_start();


    /* verification si le nom et password sont hesiste dans le BD */
        $query = "SELECT * FROM users WHERE user_name = :user_name AND password = :password";  
        $statement = $bd->prepare($query);  
        $statement->execute(  
                array(  
                'user_name'=> $_POST["user_name"],  
                'password'=>$_POST["password"]  
                )  
        );  

        $count = $statement->rowCount();  
        
        if($count > 0)  
        {  
                $_SESSION["user_name"] = $_POST["user_name"];
                echo '<script>
                    location.href="../index.php";
                </script>';
        }  
        else  
        {  
                echo 'Error';
        }  
   