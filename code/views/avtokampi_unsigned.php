<?php
include("../config/config.php");
include("../config/userClass.php");
include("../config/databaseClass.php");
$userClass = new userClass();

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
    <title>AVTO EVROPA</title>
    <link rel="icon" href="../img/logoevropa.gif" type="image/png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <style>
        body {
            font-family: 'Varela Round', sans-serif !important;
            font-size: 14px;
        }

        .navbar {
            background-color: #0D275C !important;
            color: white !important;
        }

        .icon-size {
            font-size: 24px !important;
        }

        .icon-design {
            background-color: #246BFF;
            border-radius: 100% !important;
            padding: 17px 20px 17px 20px;
            transition: 0.4s all ease-in-out;
            color: white !important;
            box-shadow: 2px 5px 10px !important;
            margin: 15px 0;
        }

        .icon-design:hover {
            color: silver !important;
            box-shadow: 2px 3px 10px;
        }


        .portfolio-item-caption {
            -webkit-transition: all ease .5s;
            transition: all ease .5s;
            opacity: 0;
            background-color: rgba(24, 188, 156, .9);
        }

        .portfolio-item-caption:hover {
            opacity: 1;
        }

        .portfolio-item {
            position: relative;
        }

        /* Hide/rearrange for smaller screens */
        @media screen and (max-width: 767px) {

            /* Hide captions */
            .carousel-caption {
                display: none;
            }
        }
        
        .input_search {
            border-radius: 30px;
        }

        .c-white {
            color: white !important;
            margin: auto 10px auto 10px !important;
        }
    </style>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../img/logoevropa.gif" alt="Logo" width="75"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">DOMOV</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php if (isset($_SESSION['uid'])) {
                                                                        echo 'avtokampi_signed.php';
                                                                    } else {
                                                                        echo 'avtokampi_unsigned.php';
                                                                    } ?>">OGLEJ SI AVTOKAMPE</a></li>
                    <li class="nav-item"><a class="nav-link" href="avtokampi_reservation.php">REZERVIRAJ AVTOKAMP</a></li>
                    <li class="nav-item"><a class="nav-link" href="avtokampi_add.php">VPIS NOVEGA AVTOKAMPA</a></li>
                    <li class="nav-item"><a class="nav-link" href="onas.php">O NAS</a></li>
                    <li class="nav-item"><a class="nav-link" href="kontakt.php">KONTAKT</a></li>
                </ul>

                <ul class="navbar-nav navbar-right">
                    <?php if (isset($_SESSION['uid'])) : ?>


                        <div class="btn-group" style="margin: 6px 0 0 0">
                            <a class="dropdown-toggle" style="text-decoration:none;background-color: transparent; cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pozdravljen <?= $userDetails->name ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu color-black">
                                <li class="color-black dropdown-item"><a style="color: black;" href="nadzorna-plosca.php" class="color-black">Nadzorna plošča</a></li>
                                <li class="color-black dropdown-item"><a href="logout.php" class="color-black">Odjava</a></li>
                            </ul>
                        </div>

                    <?php else : ?>
                        <?php

                        ?>
                        <li>
                            <a href="signup.php" data-toggle="tooltip" title="Registracija" class="c-white">
                                <i class="far fa-user-circle icon-size" data-tippy="Registracija" tabindex="0"></i>
                            </a>
                        </li>
                        <li>
                            <a href="login.php" data-toggle="tooltip" title="Prijava" class="c-white">
                                <i class="fas fa-sign-in-alt icon-size" data-tippy="Prijava" tabindex="0"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div style="margin: 120px;"></div>

    <div class="container">
        <div class="row">

            <?php

            foreach (DatabaseClass::getAllCamps() as $kamp) : ?>

                <div class="col-md-6 col-lg-4 mb-4 mx-auto">
                    <a class="portfolio-item d-block" href="#portfolio-modal-<?= $kamp['id'] ?>" data-toggle="modal" data-target="#portfolio-modal-<?= $kamp['id'] ?>">
                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                                <i class="fas fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="<?= $kamp['slika'] ?>" alt="">
                    </a>
                </div>

                <div class="modal fade" id="portfolio-modal-<?= $kamp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="text-secondary text-uppercase mb-0"><?= $kamp['naziv'] ?> (<?= $kamp['kraj'] ?>)</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-8 mx-auto">
                                        <p>CENA: <?= $kamp['cena'] ?> €</p>
                                        <img class="img-fluid mb-5" src="<?= $kamp['slika'] ?>" alt="">
                                        <p class="mb-5"><?= $kamp['opis'] ?></p>
                                        <button class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-close"></i>
                                            ZAPRI
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

        <hr>
        <footer style="text-align:center">
            <p>© 2019 - Anže Luzar</p>
        </footer>
    </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>