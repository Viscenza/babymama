<?php
include_once('_DB/connexionDB.php');
$var = "Inscription"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <nav>
    <h1>Yaye ak Dome</h1>
    <div class="onglet">
      <a href="#Home">Home</a>
      <a href="#podcasts">Podcasts</a>
      <a href="#contact">Contact</a>
    </div>
  </nav>
   <header>
    <h1>Woman and Baby health care</h1><br>
  </header>

  <div class="link">
    <a href="../inscription.php"></a>
    <a href="../connexion.php"></a>
  </div>
  <h1><?php $var ?></h1>
</body>
</html>
