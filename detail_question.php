<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/forum.css"/>
    <title>Document</title>
</head>
<body>

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

<?php
include 'config.php';


if (isset($_GET['id_question']) ) {
    // display data from table question
    $stmt = $bd->prepare('SELECT * FROM questions WHERE id_question = ?');
    $stmt->execute([$_GET['id_question']]);
    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$question) {
        exit('question doesn\'t exist with that ID!');
    }

    error_reporting(E_ERROR | E_PARSE);

}
else {
    exit('Not found');
    }

$response = "SELECT * from reponses WHERE question_id = '".$_GET['id_question']."'";
?>
    <div style="padding-bottom: 5%;">
        <div class="container">
            <div class="card">
                <h2><?=$question['title_question']?></h2>
                <p><?=$question['text_question']?> </p>
            </div>

            <div class="rep">
                <p>Reponses</p>
            </div>
            
            <?php foreach ($bd->query($response) as $reponse): ?>
                <div style="width: 70%;">
                    <p class="reponse"><?=$reponse['text_reponse']?></p>
                </div>
            <?php endforeach; ?>
            
            <form action="detail_question_config.php?id_question=<?=$question['id_question']?>" method="post">
                <!-- <label for="text">Text reponse</label> -->
                <textarea 
                    name="textReponse" 
                    id="text"
                    required>
                </textarea>
                <input type="submit" value="Repondre" >
            </form>

        </div>
    </div>
</body>
</html>