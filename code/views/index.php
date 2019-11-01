<?php
include("../config/config.php");
include("../config/userClass.php");
$userClass = new userClass();
$userDetails = $userClass->userDetails($_SESSION['uid']);

$errorMsgReg = '';
$errorMsgLogin = '';
/* Login Form */
if (!empty($_POST['loginSubmit'])) {
    $usernameEmail = $_POST['usernameEmail'];
    $password = $_POST['password'];
    if (strlen(trim($usernameEmail)) > 1 && strlen(trim($password)) > 1) {
        $uid = $userClass->userLogin($usernameEmail, $password);
        if ($uid) {
            $url = BASE_URL . 'home.php';
            header("Location: $url"); // Page redirecting to home.php 
        } else {
            $errorMsgLogin = "Please check login details.";
        }
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVTKAMPI</title>
    <link rel="icon" href="../img/logoevropa.gif" type="image/png">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <style>
    body {
        font-family: 'Varela Round', sans-serif !important;
        color: white !important;
        padding-top: 50px;
        padding-bottom: 20px;
        background-image: url("../img/backgrounds/1.jpg");
        /*font-size: 18px !important;*/
    }
    </style>
</head>

<body>
    <script>
        window.onload = function() {

            function changeImage() {
                var BackgroundImg = ["../img/backgrounds/1.jpg",
                    "../img/backgrounds/2.jpg",
                    "../img/backgrounds/3.jpg",
                    "../img/backgrounds/4.jpg"
                ];
                var i = Math.floor((Math.random() * 4));
                document.body.style.backgroundImage = 'url("' + BackgroundImg[i] + '")';
            }
            window.setInterval(changeImage, 5000);
        }
    </script>
    <?php include("navigation.php"); ?>

    <div class="body-content">
        <div class="container-fluid">
            <div class="typewriter">
                <h1>DOBRODOŠLI! AVTOKAMPI VAS PRIČAKUJEJO!</h1>
            </div>
            <p style="font-size: 150%; text-align: justify; margin-bottom: 40px;">
                Spletna stran je namenjena vsem ljubiteljem kampiranja in preživljanja dopusta v naravi, zato bomo veseli tudi vaših informacij o novih kampih, postajališčih za avtodome in glamping naselij, ki jih lahko posredujete na naš mail. Prav tako bomo veseli podatkov o novostih v kampih, izboljšani dodatni ponudbi in tudi fotografij kampov.</p>
            <div id="controlPanel">
                <ul>
                    <li><a href="login.php">PRIJAVI SE</a></li>
                    <li><a href="signup.php">REGISTRIRAJ SE</a></li>
                </ul>
            </div>

            <hr>
            <footer style="text-align:center">
                <p>© 2019 - Anže Luzar</p>
            </footer>
        </div>
    </div>

</body>

</html>