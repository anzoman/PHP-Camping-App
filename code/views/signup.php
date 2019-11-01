<?php
include("../config/config.php");
include("../config/userClass.php");
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);

$errorMsgReg = '';
$errorMsgLogin = '';
/* Signup Form */
if (!empty($_POST['signupSubmit'])) {
    $username = $_POST['usernameReg'];
    $email = $_POST['emailReg'];
    $password = $_POST['passwordReg'];
    $name = $_POST['nameReg'];
    /* Regular expression check */
    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

    if ($username_check && $email_check && $password_check && strlen(trim($name)) > 0) {
        $uid = $userClass->userRegistration($username, $password, $email, $name);
        if ($uid) {
            $url = BASE_URL . 'views/index.php';
            header("Location: $url"); // Page redirecting to home.php 
        } else {
            $errorMsgReg = "UPORABNIŠKO IME ALI EMAIL ŽE OBSTAJA!";
        }
    }
    elseif(empty($username) || empty($email) || empty($password) || empty($name)) {
        $errorMsgReg = "Izpolniti je potrebno vsa polja!";
    }
    else {
        $errorMsgReg = "NAPAČEN VNOS!";
    }

}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVTO EVROPA</title>
    <link rel="icon" href="/img/logoevropa.gif" type="image/gif">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

</head>

<body>
    <?php include("navigation.php") ?>

    <div class="body-content">
        <div class="container-fluid">

            <div class="container">
                <div class="jumbotron text-center" style="width: 500px; margin: 0 auto; border-radius: 35px;">
                    <h2>Registracija</h2>
                    <section>
                        <form method="post" novalidate="novalidate">
                            <h4>Vpiši podatke spodaj in se registriraj.</h4>
                            <hr>
                            <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>
                            
                            <div class="errorMsg" style="color:red;margin: 0 0 30px 0;"><?php echo $errorMsgReg; ?></div>

                            <div class="form-group">
                                <label>Ime</label>
                                <input class="form-control" type="text" name="nameReg" autocomplete="off" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Input.Username" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="emailReg" autocomplete="off" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Input.Password" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label>Uporabniško ime</label>
                                <input class="form-control" type="text" name="usernameReg" autocomplete="off" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Input.Password" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label>Geslo</label>
                                <input class="form-control" type="password" name="passwordReg" autocomplete="off" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Input.Password" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" name="signupSubmit" value="Registriraj se">
                            </div>
                        </form>
                    </section>
                </div>
            </div>


            <hr>
            <footer style="text-align:center">
                <p>© 2018 - Anže Luzar</p>
            </footer>
        </div>
    </div>



</body>

</html>