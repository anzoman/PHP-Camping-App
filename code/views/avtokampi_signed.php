<?php
include("../config/config.php");
include("../config/userClass.php");
include("../config/databaseClass.php");

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
        <div class="row">
            <div class="col search-box text-center justify-content-center">
                <label for="naziv_search">Naziv</label>
                <div class="input-group">
                    <input id="naziv_search" type="text" class="form-control input_search shadow" placeholder="Iskanje">
                </div>
            </div>
            <div class="col search-box text-center justify-content-center">
                <label for="kraj_search">Kraj</label>
                <div class="input-group">
                    <input id="kraj_search" type="text" class="form-control input_search shadow" placeholder="Iskanje">
                </div>
            </div>
            <div class="col search-box text-center justify-content-center">
                <label for="cena_number">Cena na noč (v €)</label>
                <div class="input-group justify-content-center">
                    <input id="cena_search" type="range" class="custom-range input_search" min="1" step="1" max="100" value="100" id="price">
                    <span id="range_number"></span>
                </div>
            </div>
        </div>

        <div class="table-title" style="margin-top: 50px;">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <h2 class="text-center">Avtokampi</h2>
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
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody id="data_of_table"></tbody>
        </table>
    </div>

    <div class="container">
        <div class="row">

            <?php foreach (DatabaseClass::getAllCamps() as $kamp) : ?>
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


    <script>
        function update_table() {

            $.ajax({
                method: "GET",
                url: "ajax_table.php",
                dataType: "json",
                data: {
                    naziv: $("#naziv_search").val(),
                    cena: $("#cena_search").val(),
                    kraj: $("#kraj_search").val()
                },
                success: function(data) {
                    $("#data_of_table").empty();

                    for (kamp in data) {

                        $("#data_of_table").append(`
                            <tr id="table-${data[kamp]['id']}">
                                <td>${data[kamp]['id']}</td>
                                <td>${data[kamp]['naziv']}</td>
                                <td>${data[kamp]['kraj']}</td>
                                <td>${data[kamp]['cena']} €</td>
                                <td>${data[kamp]['name']}</td>
                                <td class="text-center">
                                    <a href="#portfolio-modal-${data[kamp]['id']}" data-toggle="modal" data-target="#portfolio-modal-${data[kamp]['id']}" class="view text-success" title="" data-toggle="tooltip" data-original-title="View"><i class="material-icons"></i></a>
                                    <a href="#portfolio-modal-${data[kamp]['id']}" data-toggle="modal" data-target="#portfolio-modal-${data[kamp]['id']}" class="edit text-warning mx-3" title="" data-toggle="tooltip" data-original-title="Edit"><i class="material-icons"></i></a>
                                    <a id="delete-${data[kamp]['id']}" class="delete text-danger" title="" data-toggle="tooltip" data-original-title="Delete" onclick="delete_camp(event, '${data[kamp]['id']}', '${data[kamp]['naziv']}');"><i class="material-icons"></i>
                                    </a>
                                </td>
                            </tr>
                        `);

                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function delete_camp(e, kamp_id, kamp_naziv) {
            e.preventDefault();
            if (confirm(`ALI RES ŽELITE IZBRISATI ${kamp_naziv}?`)) {
                $.post("delete_camp.php", {
                    id: kamp_id
                }, function() {
                    $(`#table-${kamp_id}`).remove();
                });
            }
        }

        $($("#range_number").text($("#cena_search").val()));

        $("#naziv_search").on("input", () => {
            update_table();
        });
        $("#cena_search").on("input", () => {
            update_table();
            $("#range_number").text($("#cena_search").val());
        });
        $("#kraj_search").on("input", () => {
            update_table();
        });

        $(document).ready(() => {
            update_table();
        });
    </script>
</body>

</html>