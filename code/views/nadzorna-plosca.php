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

    <div class="container">
        <div class="table-title" style="margin-top: 50px;">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <h2 class="text-center">VPISANI AVTOKAMPI</h2>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Naziv <i class="fa fa-sort"></i></th>
                    <th>Kraj</th>
                    <th>Cena <i class="fa fa-sort"></i></th>
                    <th>Uporabnik</th>
                </tr>

                <?php foreach (DatabaseClass::getCampsAddedByUser($_SESSION['uid']) as $kamp) : ?>
                    <tr>
                        <td><?= $stevilo++ ?></td>
                        <td><?= $kamp['naziv'] ?></td>
                        <td><?= $kamp['kraj'] ?></td>
                        <td><?= $kamp['cena'] ?></td>
                        <td><?= DatabaseClass::getUserById($kamp['user_id'])['name'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </thead>
            <tbody id="data_of_table"></tbody>
        </table>
    </div>

    <div class="container">
        <div class="table-title" style="margin-top: 50px;">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <h2 class="text-center">REZERVACIJE</h2>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Naziv <i class="fa fa-sort"></i></th>
                    <th>Kraj</th>
                    <th>Cena <i class="fa fa-sort"></i></th>
                    <th>Od</th>
                    <th>Do</th>
                    <th>Uporabnik</th>
                </tr>

                <?php
                $stevilo = 1;
                foreach (DatabaseClass::getAllReservationsForUser($_SESSION['uid']) as $res) : ?>
                    <tr>
                        <td><?= $stevilo++ ?></td>
                        <td><?= DatabaseClass::getKampById($res['kamp_id'])['naziv'] ?></td>
                        <td><?= DatabaseClass::getKampById($res['kamp_id'])['kraj'] ?></td>
                        <td><?= DatabaseClass::getKampById($res['kamp_id'])['cena'] ?></td>
                        <td><?= $res['od'] ?></td>
                        <td><?= $res['do'] ?></td>
                        <td><?= DatabaseClass::getUserById($res['user_id'])['name'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </thead>
            <tbody id="data_of_table"></tbody>
        </table>
    </div>

    <div class="container">

        <hr>
        <footer style="text-align:center">
            <p>© 2019 - Anže Luzar</p>
        </footer>
    </div>
    </div>
</body>

</html>