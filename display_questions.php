<!-- Affichage les differentes question  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display questions</title>
    <link rel="stylesheet" href="./style/displays.css">
</head>

<body>
    <!-- Header section -->
  <div class="header">
    <div class="conainer">
      <div class="header-content">
        <div class="logo">
          <p id=logo>
             <a href="index.html">Babymama</a>
            </p>
        </div>
        <ul class="nav">
          <li><a href="./auth/auth.html">Login</a></li>
          <li><a href="./auth/register.html">Register</a></li>
        </ul>
      </div>
    </div>
  </div>
    <?php
    include 'config.php';

    $requete = 'SELECT * FROM questions';
    ?>

    <div class="container">
        <p class="para2">Choisisez une question</p>

        <?php foreach ($bd->query($requete) as $row): ?>

            <div class="card">
                <a href="detail_question.php?id_question=<?= $row['id_question'] ?>"> 
                    <h3 class="para"><?= $row['title_question'] ?></h3>
                    <p class="para1"><?= $row['text_question'] ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>