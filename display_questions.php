<!-- Affichage les differentes question  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display questions</title>
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


<style>
    @import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,300&display=swap');
.overlay {
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	background-color: rgba(0,0,0,0.7);
}

.hover-opacity {
	transition: opacity .5s;
}

.hover-opacity:hover {
	opacity: 0.7;
}

.ltr-effect, .tb-effect  {
	position: relative;
}

 .ltr-effect:after, .tb-effect:after {
	position: absolute;
	content: "";
	right: 0;
	top: 0;
	left: 0;
	bottom: 0;
	background-color:transparent;
	z-index: -1;
} 
.ltr-effect:after {
	width: 0;
	transition: width 0.5s;
}
.tb-effect:after {
	height: 0;
	transition: height 0.5s;
}
 .ltr-effect:hover:after {
	width: 100%;
}
.tb-effect:hover:after {
	height: 100%;
}

/* 2-General styles */


* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

logo{
	font-family: 'Sacramento', sans-serif;
	width: 100px;
}
.clear {
	clear: both;
}

.pd-y {
	padding: 120px 0;
}

.section-header {
	text-align: center;
	margin-bottom: 20px;  
}

.section-header .section-title {
	font-size: 35px;
	text-transform: capitalize;
	margin-bottom: 10px;
}

.section-header .line {
	display: block;
	height: 2px;
	width: 100px;
	background-color: #6195ff;
	margin-bottom: 10px;
	margin: 0px auto 70px auto;
}

.header-content {
	overflow: hidden;
} /* to solve flot problem*/


/* Heder section */

.header {
	background-color: transparent;
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

body{
    height: 100vh;
    margin: 0px;
    font-family:'Roboto Flex', sans-serif;

	background: #616A6B;
}

header{
    display: flex;
    justify-content: space-between;
    padding: 24px;
    margin-bottom: 2.5%;
}

a{
    font-size: 20px;
    margin: 10px;
    color: rgb(248, 239, 239);
    text-decoration: none;
}

.nas:hover{
    color: rgb(34,193,195);;
}

.container{
    font-size: 20px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

}

.card{
    width: 98%;
    min-height: 90px;
    background: #2E86C1;
    border: none;
    border-radius: 5px;
    padding-left: 10px;
    margin-top: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: rgb(111,155,204);
background: linear-gradient(90deg, rgba(111,155,204,1) 0%, rgba(18,143,144,1) 97%);
}

.para{
    color: #ECF0F1;

}

.container .para2{
    text-align: left;
    width: 98%;
    font-weight: bold;
    color: white;
}

.nas{
    font-weight: bold;
}

@media screen and (max-width: 800px){
    a, .container{
        font-size: 18px;
    }

    h3{
        font-size: 18px;

    }
}

@media screen and (max-width: 490px){

    a{
        font-size: 16px;

    }
}

@media screen and (max-width: 295px){

    a{
        font-size: 14px;

    }
}
</style>