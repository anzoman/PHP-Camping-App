<style>

    .navbar {
        background-color: #0D275C;
        color: white !important;
        padding: 20px 0 15px 0 !important;
    }

    .navbar a {
        color: white;
    }

    .navbar-brand {
        padding: 0 !important;
        margin: -12px 0 0 0 !important;
    }

    .nav {
        margin-left: 30px !important;
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

    /* Wrapping element */
    /* Set some basic padding to keep content from hitting the edges */
    .body-content {
        padding-left: 15px;
        padding-right: 15px;
        margin-top: 100px !important;
    }

    /* Carousel */
    .carousel-caption p {
        font-size: 20px;
        line-height: 1.4;
    }

    /* Make .svg files in the carousel display properly in older browsers */
    .carousel-inner .item img[src$=".svg"] {
        width: 100%;
    }

    /* QR code generator */
    #qrCode {
        margin: 15px;
    }

    /* Hide/rearrange for smaller screens */
    @media screen and (max-width: 767px) {

        /* Hide captions */
        .carousel-caption {
            display: none;
        }
    }

    #title h1 {
        text-align: center;
        margin: auto;
        width: 1000px;
        color: black;
        font-family: 'ZCOOL QingKe HuangYou', cursive;
        font-size: 75px;
        margin-top: 0;
    }

    #controlPanel {
        margin: 50px auto;
        width: 375px;
    }

    #controlPanel li {
        list-style: none;
        margin: 5px;
        width: 275px;
        display: block;
        background: #075088;
    }

    #controlPanel li:hover {
        background: #075593;
    }

    #rcorners {
        border-radius: 25px;
        border: 2px solid #73AD21;
        padding: 20px;
        width: 200px;
        height: 150px;
    }

    #controlPanel li a {
        display: block;
        font-family: Arial, Helvetica, sans-serif;
        text-decoration: none;
        color: #ffffff;
        text-align: center;
        padding: 10px;
        width: 275px;
        border-radius: 3px;
        cursor: pointer;
    }

    .typewriter h1 {
        color: yellow;
        overflow: hidden;
        border-right: .15em solid orange;
        white-space: nowrap;
        margin: 20 auto;
        letter-spacing: .15em;
        animation:
            typing 3.5s steps(40, end),
            blink-caret .75s step-end infinite;
    }

    @keyframes typing {
        from {
            width: 0
        }

        to {
            width: 100%
        }
    }

    @keyframes blink-caret {

        from,
        to {
            border-color: transparent
        }

        50% {
            border-color: orange;
        }
    }

    .color-black {
        color: black !important;
    }
</style>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="../img/logoevropa.gif" alt="Logo" width="75">
            </a>
        </div>
        <div class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li><a href="index.php">DOMOV</a></li>
                <li><a href="<?php if(isset($_SESSION['uid'])) { echo 'avtokampi_signed.php'; } else { echo 'avtokampi_unsigned.php'; } ?>">OGLEJ SI AVTOKAMPE</a></li>
                <li><a href="avtokampi_reservation.php">REZERVIRAJ AVTOKAMP</a></li>
                <li><a href="avtokampi_add.php">VPIS NOVEGA AVTOKAMPA</a></li>
                <li><a href="onas.php">O NAS</a></li>
                <li><a href="kontakt.php">KONTAKT</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['uid'])) : ?>
                    
                <div class="btn-group" style="margin: 15px 0 0 0">
                    <a class="dropdown-toggle" style="text-decoration:none;background-color: transparent; cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pozdravljen <?= $userDetails->name ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu color-black">
                        <li class="color-black"><a style="color: black;" href="nadzorna-plosca.php" class="color-black">Nadzorna plošča</a></li>
                        <li class="color-black"><a href="logout.php" class="color-black">Odjava</a></li>
                    </ul>
                </div>

                <?php else : ?>
                    <li>
                        <a href="signup.php" data-toggle="tooltip" title="Registracija">
                            <i class="far fa-user-circle icon-size" data-tippy="Registracija" tabindex="0"></i>
                        </a>
                    </li>
                    <li>
                        <a href="login.php" data-toggle="tooltip" title="Prijava">
                            <i class="fas fa-sign-in-alt icon-size" data-tippy="Prijava" tabindex="0"></i>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>

        </div>
    </div>
</nav>