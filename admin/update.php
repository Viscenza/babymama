<!-- Page pour mettre a jour les donnees-->

<?php
    /* importation du fichier de connexion vers la base de
     Donnee */
    include '../config.php';

    /* Une condition permettant de retrouver l'id de la question afin de 
     voir son contenu */
    if (isset($_GET['id_question'])) {
        $stmt = $bd->prepare('SELECT * FROM questions WHERE id_question = ?');
        $stmt->execute([$_GET['id_question']]);

        $question = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$question) {
            exit('Impossible de mettre a jour');
        }
    } else {
        exit('La Question n\'existe pas');
    }
?>


<!-- side client -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Babymama</title>
</head>

<body>
  <div class="header">
    <div class="conainer">
      <div class="header-content">
        <div class="logo">
          <p id=logo>Babymama</p>
        </div>
        <ul class="nav">
          <li><a href="./admin.php">Admin</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="home" id="home">
    <div class="overlay">
      <div class="home-contant">
      </div>
    </div>
    <br> <br> <br> <br> <br>
    <center>
      <div class="login">
        <h2>Modifier la question</h2><br>
        <form class="login-form" action="register_config.php" method="post" >
          <div class="sign-in-htm">
            <div class="group">
              <input name="user_name" id="user" type="text" class="input" value= "<?= $question['title_question'] ?>"><br>
            </div>
            <div class="group">
            <textarea 
                    maxlength="700"
                    name="text" required id="text" >
                    <?= $question['text_question'] ?>
                </textarea>
            </div>
            <div class="group">
            <input type="submit" class="button" value="Changer"><br>
            </div>
          </div>
        </form>
      </div>
    </center>
  </div>
</body>
</html>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,300&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body , h1 , h2, h3 , h4 , h5 , h6 , button {
    font-family: 'Poppins', sans-serif;
  }
  #logo{
    font-family: 'Sacramento', sans-serif;
    width: 100px;
  }
  .header-content {
    overflow: hidden;
  }
  .header {
    background-color: transparent;
    position: fixed;
    width: 100%;
    z-index: 10;
  }
  .header .logo {
    width: 40%;
    height: 20%;
    font-size: 25px;
    font-weight: bold;
    float: left;
    padding-top: 25px;
    color: #fff;
    padding-left: 40px;
  }
  .header .nav {
    width: 60%;
    float: left;
    list-style: none;
  }
  .header .nav li {
    display: inline-block;
    margin-right: 30px;
  }
  .header .nav li a {
    font-size: 12px;
    color: #80a7f7;
    text-decoration: none;
    display: block;
    padding: 30px 10px;
  }
  .header .nav li a:after {
    content: "";
    display: block;
    width: 0;
    height: 3px;
    background-color: #6195ff;
    transition: width 0.5s;
    margin-top: 3px;
  }
  .header .nav li a:hover:after {
    width: 100%;
  }
  .home {
    height: 100vh;
    background-image: url("../images/stairs.jpg");
    background-position: center;
    background-size: cover;
    position: relative;
  }
  .home .title {
    color: #fff;
    font-size: 40px;
    text-transform: uppercase;
  }
  .home-contant {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
    color: #fff;
    width: 50%;
  }
  .home-desc {
    margin: 20px 0;
    color: #fff;
    letter-spacing: 2px;
    line-height: 1.5;
  }
  a{
    color:inherit;
    text-align: center;
    text-decoration:none

  }
  .overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,0.7);
  }
  h2{
    text-align: center;
    color: #80a7f7;
  }


  .login{
    text-align: center;
    padding:90px 70px 50px 70px;
    background:rgba(40, 68, 101, 0.9);
    border-radius: 10px;
    width: 40%;
    box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
    border-radius: 10px;
  }
  .login-form{
    min-height:350px;
    perspective:1000px;
  }
  .login-form .group{
    margin-bottom:15px;
  } 
 
  textarea{
    min-height: 150px;
    background:rgba(255,255,255,.1);
    border: none;
    border-radius: 10px;
    margin-bottom: 40px;
    color: rgb(26, 24, 24);
    padding-left: 10px;
    font-size: 18px;
}


 textarea, .input, .login-form .group .button{
    width:100%;
    color:#fff;
    display:block;
  }
  .login-form .group .input,
  .login-form .group .button{
    border:none;
    padding:15px 20px;
    border-radius:25px;
    background:rgba(255,255,255,.1);
  }
  .login-form .group .button{
    background:#80a7f7;
  }
</style>