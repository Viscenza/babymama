
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
          <li><a href="../admin/auth_admin.html">Admin</a></li>
          <li><a href="../display_questions.php">Questions</a></li>
          <li><a href="./register.html">Register</a></li>
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

  <div class="home" id="home">
    <div class="overlay">
      <div class="home-contant">
      </div>
    </div>
    <br> <br>
    <center>
      <div class="login">
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
        <form class="login-form" action="detail_question_config.php?id_question=<?=$question['id_question']?>" method="post" >
            <div class="group">
            <textarea 
                    maxlength="700"
                    name="textReponse" required id="text" >
                </textarea>
            </div>      
            <div class="group">
            <input type="submit" class="button" value="Repondre"><br>
            </div>     
        </div>
        </form>
      </div>
    </center>
  </div>
</body>
</html>

<style>

.card p{
    margin-top: 3%;
    font-size: 18px;
    color: white
}

.rep{
    font-size: large;
    font-weight: bold;

}

    .login{
        margin-top: 5%
    }
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
    background-image: url("./images/stairs.jpg");
    background-position: center;
    background-size: cover;
    position: relative;
    background-attachment : fixed;

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
    color: white;
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
    width: 100%;
    min-height: 100px;
    background:rgba(255,255,255,.1);
    border: none;
    border-radius: 10px;
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

  .reponse{
    margin-top: 20px;
    background: #D5DBDB;
    padding: 12px;
    border-radius: 10px;
    font-size: 18px;
    font-weight:none;
    background: rgb(111,155,204);
    background: linear-gradient(90deg, rgba(111,155,204,1) 0%, rgba(18,143,144,1) 97%);
}
</style>