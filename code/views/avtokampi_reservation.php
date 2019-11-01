<?php
include("../config/config.php");
include("../config/userClass.php");
include("../config/databaseClass.php");

$stevilo = 1;

if (!isset($_SESSION['uid'])) {
    $url = BASE_URL . 'views/login.php';
    header("Location: $url");
}

include("../session/session.php");
$userClass = new userClass();
$userDetails = $userClass->userDetails($_SESSION['uid']);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVTO EVROPA</title>
    <link rel="icon" href="../img/logoevropa.gif" type="image/png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.tutorialrepublic.com/lib/styles/snippets-1.7.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <style>
        body {
            font-family: 'Varela Round', sans-serif !important;
            font-size: 14px;
        }

        .navbar {
            background-color: #0D275C !important;
            color: white !important;
            padding: 20px 0 15px 0 !important;
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

        .front,
        .back {
            border: 1px solid #0A9AD7 !important;
            -webkit-tap-highlight-color: #0A9AD7;
            padding: 30px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .element1 {
            backface-visibility: hidden;
            transform-style: preserve-3d;
            position: absolute;
            z-index: 1;
            height: 100%;
            width: 100%;
            transition: all 0.5s ease-out 0s;
            transform: rotateY(0deg);
        }

        .flipFront {
            backface-visibility: hidden;
            transform-style: preserve-3d;
            position: absolute;
            z-index: 0;
            height: 100%;
            width: 100%;
            transition: all 0.5s ease-out 0s;
            transform: rotateY(180deg);
        }

        .element2 {
            backface-visibility: hidden;
            transform-style: preserve-3d;
            position: relative;
            z-index: 0;
            height: 100%;
            width: 100%;
            transform: rotateY(-180deg);
            transition: all 0.5s ease-out 0s;
        }

        .flipBack {
            backface-visibility: hidden;
            transform-style: preserve-3d;
            position: relative;
            z-index: 1;
            height: 100%;
            width: 100%;
            transform: rotateY(0deg);
            transition: all 0.5s ease-out 0s;
        }

        .warning {
            background-color: #ffc107;
        }

        .red {
            background-color: #dc3545;
        }

        .green {
            background-color: #28a745;
        }

        .blue {
            background-color: #007bff;
        }

        .border-error {
            border: 1px solid #dc3545 !important;
        }

        .border-success {
            border: 1px solid #28a745 !important;
        }

        .error {
            display: none;
            font-size: 11px;
            color: #dc3545 !important;
            margin-left: 25px;
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

    <div style="margin: 150px;"></div>

    <div class="row container-fluid">
        <?php foreach (DatabaseClass::getAllCamps() as $kamp) : ?>
            <div class="col-sm-4">
                <div class="content-<?= $kamp['id'] ?>" onmouseover="zavrti(this)" onmouseleave="odvrti(this)" style="height: 400px;">
                    <div class="front element1">
                        <h4 style="backface-visibility: hidden;"><?= $kamp['naziv'] ?> </h4>
                        <img src="<?= $kamp['slika'] ?>" style="backface-visibility: hidden;">
                    </div>
                    <div class="back element2">
                        <div class="summary" style="backface-visibility: hidden;"><?= $kamp['opis'] ?></div>
                        <a href="#portfolio-modal-<?= $kamp['id'] ?>" data-toggle="modal" data-target="#portfolio-modal-<?= $kamp['id'] ?>" class="btn btn-primary" style="backface-visibility: hidden;">REZERVIRAJ</a>

                    </div>

                </div>
            </div>

        <?php endforeach; ?>
    </div>


    <?php foreach (DatabaseClass::getAllCamps() as $kamp) : ?>
        <div class="modal fade" id="portfolio-modal-<?= $kamp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="text-secondary text-uppercase mb-0"><?= $kamp['naziv'] ?> (<?= $kamp['kraj'] ?>) - <?= $kamp['cena'] ?> € / dan</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="input-form" action="add_reservation.php" method="post">
                            <div class="form-header">
                                <h3>Rezervacija avtokampa</h3>
                            </div>
                            <div class="form-container">
                                <div>
                                    <input type="hidden" value="<?= $_SESSION['uid'] ?>" name="user_id">
                                    <input type="hidden" value="<?= $kamp['id'] ?>" name="kamp_id">
                                    <input type="hidden" value="<?= $kamp['cena'] ?>" name="cena">
                                </div>
                                <div class="form-group">
                                    <label for="od-input">DATUM PRIHODA</label>
                                    <div class="form-od">
                                        <input name="od" class="form-control datum-<?= $kamp['id'] ?> od-input" type="text" id="datum1-<?= $kamp['id'] ?>" onmouseover="picker1(this)" oninput="odValidacija(this)" required>
                                        <span class="error">To polje je obvezno</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="do-input">DATUM ODHODA</label>
                                    <div class="form-do">
                                        <input name="do" class="form-control datum-<?= $kamp['id'] ?> do-input" type="text" id="datum2-<?= $kamp['id'] ?>" onmouseover="picker2(this)" oninput="doValidacija(this)" required>
                                        <span class="error">To polje je obvezno</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary" id="add-form-item">Dodaj</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

    <script>
        function zavrti(event) {
            let a = $(event).attr("class");
            $("." + a + " .front").removeClass("flipFront");
            $("." + a + " .back").removeClass("flipBack");
            $("." + a + " .front").addClass("flipFront");
            $("." + a + " .back").addClass("flipBack");
        }

        function odvrti(event) {
            let a = $(event).attr("class");
            $("." + a + " .front").addClass("flipFront");
            $("." + a + " .back").addClass("flipBack");
            $("." + a + " .front").removeClass("flipFront");
            $("." + a + " .back").removeClass("flipBack");
        }

        function picker1(event) {
            let a = $(event).attr("id");
            $("#" + a).datepicker({
                dateFormat: 'dd. mm. yy'
            });
        }

        function picker2(event) {
            let a = $(event).attr("id");
            $("#" + a).datepicker({
                dateFormat: 'dd. mm. yy'
            });
        }

        function odValidacija(event) {
            console.log(event);
            let a = "#" + $(event).attr("id");
            let regex = /^([0-2][0-9]|(3)[0-1])(\. )(((0)[0-9])|((1)[0-2]))(\. )\d{4}$/
            let odDate = $(a + ".od-input").val();
            console.log(odDate);
            let isValid = true;

            if (!regex.test(odDate)) {
                $(a + ".od-input").removeClass("border-success");
                $(a + ".od-input").addClass("border-error");
                $(".form-od .error").show();
                isValid = false;
            } else {
                $(a + ".od-input").removeClass("border-error");
                $(a + ".od-input").addClass("border-success");
                $(".form-od .error").hide();
            }
            return isValid;
        }

        function doValidacija(event) {
            console.log(event);
            let a = "#" + $(event).attr("id");
            let regex = /^([0-2][0-9]|(3)[0-1])(\. )(((0)[0-9])|((1)[0-2]))(\. )\d{4}$/
            let doDate = $(a + ".do-input").val();
            console.log(doDate);
            let isValid = true;

            if (!regex.test(doDate)) {
                $(a + ".do-input").removeClass("border-success");
                $(a + ".do-input").addClass("border-error");
                $(".form-do .error").show();
                isValid = false;
            } else {
                $(a + ".do-input").removeClass("border-error");
                $(a + ".do-input").addClass("border-success");
                $(".form-do .error").hide();
            }
            return isValid;
        }
    </script>

    <div class="container">

        <hr>
        <footer style="text-align:center">
            <p>© 2019 - Anže Luzar</p>
        </footer>
    </div>
    </div>
</body>

</html>