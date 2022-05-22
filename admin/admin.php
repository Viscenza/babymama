<!-- La page pernettant a l'admin d'effectuer des modif sur la 
    les donnees enregistrer -->

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
    <link rel="stylesheet" href="./Style/admin.css">
</head>

<body>
<?php
    include '../config.php';
    $requete = 'SELECT * FROM questions';

    ?>
<div class="header">
    <div class="conainer">
      <div class="header-content">
        <div class="logo">
          <p id=logo>Babymama</p>
        </div>
        <ul class="nav">
          <li><a href="#home">Home</a></li>
          <li><a href="/Forum.html">Forum</a></li>
          <li><a href="/Login.html">Login</a></li>
          <li><a href="/Register.html">Register</a></li>
        </ul>
      </div>
    </div>
  </div>

        <p class="text">Effectuer les changements</p>

    <div class="container">
        <?php foreach ($bd->query($requete) as $row): ?>

            <div  class="card">
                <a href="../detail.php?id_question=<?= $row['id_question'] ?>" > 
                    <p><?= $row['title_question'] ?></p>
                </a>
                <div class="admini">
                    <a href="update.php?id_question=<?= $row['id_question'] ?>">
                        <p>Modifier</p>
                    </a>
                    <a href="delete.php?id_question=<?= $row['id_question'] ?>&confirm=yes">
                        <p>Supprimer</p>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>


</html>