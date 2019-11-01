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

        .form-container {
            display: grid;
            grid-template-columns: 100%;
            justify-content: center;
            border-radius: 15px;
        }

        .form-footer {
            margin: 25px 0 0 0;
            text-align: center;
        }

        .form-control {
            margin: 10px 30px 0 0;
        }

        .form-control label {
            margin-left: 20px;
        }

        .form-control input,
        .form-control textarea,
        .form-control select {
            border-radius: 25px;
            padding: 12px 12px 12px 20px;
            margin: 12px 0 0 0 !important;
            font-size: 14px;
            color: #495057;
            border: 1px solid #ced4da;
            box-shadow: 0 1px 12px #bbb;
            width: 100% !important;
            outline: 0;
            transition: all 0.2s ease-in-out;
        }

        .form-control input:focus,
        .form-control textarea:focus,
        .form-control select:focus {
            box-shadow: 0 1px 4px #bbb;
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

    <div class="container" style="margin-top: 150px;">
        <form id="input-form" action="add_avtokamp.php" method="post">
            <div class="form-header">
                <h3>Dodajanje avtokampa</h3>
            </div>
            <div class="form-container">
                <div class="form-group">
                    <label for="naziv-input">Naziv</label>
                    <div class="form-naziv">
                        <input name="naziv" class="form-control" type="text" id="naziv-input" oninput="nazivValidacija()" required>
                        <span class="error">To polje je obvezno</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kraj-input">Kraj</label>
                    <div class="form-kraj">
                        <input name="kraj" class="form-control" type="text" id="kraj-input" oninput="krajValidacija()" required>
                        <span class="error">To polje je obvezno</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cena-input">Cena</label>
                    <div class="form-cena">
                        <input name="cena" class="form-control" type="text" id="cena-input" oninput="cenaValidacija()" required>
                        <span class="error">To polje je obvezno</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="uploadKamp">Slika kampa</label>
                    <div>
                        <input type="hidden" id="skrit" name="slika">
                        <input class="form-control" type="file" id="slika" accept="image/png, image/jpeg" onchange="convertImgToBase64()">
                        <span class="error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="opis-kampa-input">Opis kampa</label>
                    <div class="form-opis">
                        <textarea name="opis" class="form-control" name="opis-kampa" cols="40" rows="4" id="opis-kampa-input" oninput="opisValidacija()" required></textarea>
                        <span class="error">Minimalna dolžina je 20 znakov, maksimalna pa 300 znakov</span>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary" id="add-form-item">Dodaj</button>
            </div>
        </form>
    </div>

    <div class="container">

        <hr>
        <footer style="text-align:center">
            <p>© 2019 - Anže Luzar</p>
        </footer>
    </div>
    </div>

    <script>
        function convertImgToBase64() {
            let file = $('#slika').get(0).files;

            let reader = new FileReader();
            reader.addEventListener("load", () => {
                $("#skrit").val(reader.result);
            });

            if (file.length > 0) {
                reader.readAsDataURL(file[0]);
            }
        }

        function krajValidacija() {
            const znamka = $("#kraj-input").val();
            let isValid = true;

            if (znamka.length === 0) {
                $("#kraj-input").removeClass("border-success");
                $("#kraj-input").addClass("border-error");
                $(".form-kraj .error").show();

                isValid = false;
            } else {
                $("#kraj-input").removeClass("border-error");
                $("#kraj-input").addClass("border-success");
                $(".form-kraj .error").hide();
            }
            return isValid;
        }

        function nazivValidacija() {
            const naziv = $("#naziv-input").val();
            let isValid = true;

            if (naziv.length === 0) {
                $("#naziv-input").removeClass("border-success");
                $("#naziv-input").addClass("border-error");
                $(".form-naziv .error").show();

                isValid = false;
            } else {
                $("#naziv-input").removeClass("border-error");
                $("#naziv-input").addClass("border-success");
                $(".form-naziv .error").hide();
            }
            return isValid;
        }

        function cenaValidacija() {
            const cena = $("#cena-input").val();
            let isValid = true;

            if (cena.length === 0 || isNaN(Number(cena))) {
                $("#cena-input").removeClass("border-success");
                $("#cena-input").addClass("border-error");
                $(".form-cena .error").show();

                if (isNaN(Number(cena))) {
                    $(".form-cena .error").text("Vnešena vrednost ni veljavna.")
                } else {
                    $(".form-cena .error").text("To polje je obvezno!")
                }

                isValid = false;
            } else {
                $("#cena-input").removeClass("border-error");
                $("#cena-input").addClass("border-success");
                $(".form-cena .error").hide();
            }
            return isValid;
        }

        function opisValidacija() {
            const opis = $("#opis-kampa-input").val();
            let isValid = true;

            if (opis.length < 25 || opis.length > 300) {
                $("#opis-kmapa-input").removeClass("border-success");
                $("#opis-kampa-input").addClass("border-error");
                $(".form-opis .error").show();

                isValid = false;
            } else {
                $("#opis-kampa-input").removeClass("border-error");
                $("#opis-kampa-input").addClass("border-success");
                $(".form-opis .error").hide();
            }
            return isValid;
        }

        function validacija() {
            const naziv = nazivValidacija();
            const kraj = krajValidacija();
            const cena = cenaValidacija();
            const opis = opisValidacija();

            return naziv && kraj && zaloga && cena && opis;
        }
    </script>
</body>

</html>