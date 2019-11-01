<?php
include("../config/config.php");
include("../config/userClass.php");
// include("../session/session.php");
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);

$errorMsgReg = '';
$errorMsgLogin = '';
/* Login Form */
if (!empty($_POST['loginSubmit'])) {
    $usernameEmail = $_POST['usernameEmail'];
    $password = $_POST['password'];
    if (strlen(trim($usernameEmail)) > 1 && strlen(trim($password)) > 1) {
        $uid = $userClass->userLogin($usernameEmail, $password);
        if ($uid) {
            $url = BASE_URL . 'views/index.php';
            header("Location: $url"); // Page redirecting to home.php 
        } else {
            $errorMsgLogin = "Please check login details.";
        }
    }
    elseif(empty($usernameEmail) || empty($password)) {
        $errorMsgLogin = "Izpolniti je potrebno vsa polja!";
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVTO EVROPA</title>
    <link rel="icon" href="/images/Images/logoevropa.gif" type="image/png">

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
                    <h2>Prijava</h2>
                    <section>
                        <form method="post" novalidate="novalidate">
                            <h4>Prijavi se z uporabniškim imenom.</h4>
                            <hr>
                            <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>

                            <div class="errorMsg" style="color:red;margin: 0 0 30px 0;"><?php echo $errorMsgLogin; ?></div>

                            <div class="form-group">
                                <label>Uporabniško ime ali email</label>
                                <input class="form-control" type="text" name="usernameEmail" autocomplete="off" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Input.Username" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label>Geslo</label>
                                <input class="form-control" type="password" name="password" autocomplete="off" />
                                <span class="text-danger field-validation-valid" data-valmsg-for="Input.Password" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" name="loginSubmit" value="Prijavi se">
                            </div>
                            <div class="form-group">
                                <p>
                                    <a href="signup.php">Registriraj se kot
                                        nov uporabnik</a>
                                </p>
                            </div>
                            <!-- <input name="__RequestVerificationToken" type="hidden" value="CfDJ8LBewyTPn9FHuR-k3qxCM3KQfEz-4tB_sIt1MFvWfOZnRk-zq9OLO9hmcqe0p_-9ABrEFiDgL64ndeXet6p41bROxHRMorHI4rVfJOwlgl7FT48DoLZ7e_kJvUc-5aPn7KNhxN1ZSCIehwhtoXq8-Ns"><input name="Input.RememberMe" type="hidden" value="false"> -->
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