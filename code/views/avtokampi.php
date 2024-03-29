<?php
include('../config/config.php');
include('../config/databaseClass.php');

if (!empty($_SESSION['uid'])) {
    $userDetails = $userClass->userDetails($session_uid);
}

$databaseClass = new databaseClass();
$kampi = $databaseClass->getAllCamps();
?>

<h1>Welcome <?php echo $userDetails->name; ?></h1>
<h4><a href="<?php echo BASE_URL; ?>logout.php">Logout</a></h4>

<html lang="sl">

<head>
    <title>1. DOMAČA NALOGA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../styles/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../scripts/script.js"></script>
</head>

<body>
    <header class="title">
        <h1 id="main_title" onclick="clearStorage()">AVTOKAMPI</h1>
        <hr>
    </header>

    <nav id="navbar">
        <table>
            <tr>
                <td class="nav-item">
                    <a onclick="openSearch()">FILTRI</a>
                </td>
                <td class="nav-item">
                    <a onclick="displayFavourites()">PRILJUBLJENI KAMPI</a>
                </td>
                <td class="nav-item">
                    <a href="viri.html">VIRI</a>
                </td>
            </tr>
        </table>
    </nav>

    <aside>
        <div id="sidebar" class="sidenav">
            <a onclick="openSearch()">FILTRI</a>
            <a href="#prikaz2" onclick="displayFavourites()">PRILJUBLJENE</a>
            <a href="viri.html">VIRI</a>
            <a class="closebtn" onclick="closeNav()">&times;</a>
        </div>
        <span id="sidespan" onclick="openNav()">&#9776;</span>
        <br>
        <br>
        <hr>
        <br>
    </aside>

    <main>
        <div class="grid-container">
            <?
                foreach ($kampi as $kamp) {

                }
            ?>

            <div class="e-1" onclick="showInfo(this)" draggable="true" ondragstart="drag(this.className)">
                <a href="#prikaz">
                    <p>KAMP NJIVICE</p>
                </a>
            </div>
            <div class="e-2" onclick="showInfo(this)" draggable="true" ondragstart="drag(this.className)">
                <a href="#prikaz">
                    <p>KAMP STRAŠKO</p>
                </a>
            </div>
            <div class="e-3" onclick="showInfo(this)" draggable="true" ondragstart="drag(this.className)">
                <a href=" #prikaz">
                    <p>KAMP STELLA</p>
                </a>
            </div>
            <div class="d" onclick="showForm()">
                <span class="plus">+</span>
            </div>
        </div>

        <div id="obrazec" class="modal">
            <span onclick="hideForm()" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" id="form">
                <div class="container">
                    <h1>VPIŠI NOV AVTOKAMP</h1>
                    <p>Izpolni ta obrazec, da vneseš nov avtokamp.</p>
                    <hr>
                    <div class="form-content">
                        <label for="naziv"><b>Naziv</b></label>
                        <input type="text" placeholder="Vpiši naziv" id="naziv" required>
                    </div>

                    <div class="form-content">
                        <label for="kraj"><b>Kraj</b></label>
                        <input type="text" placeholder="Vpiši kraj" id="kraj" required>
                    </div>

                    <div class="form-content">
                        <label for="opis"><b>Opis</b></label>
                        <textarea id="opis" rows="4" cols="50" name="comment" form="form" placeholder="Opis kampa"
                            required></textarea>
                    </div>

                    <div class="form-content">
                        <label for="cena"><b>Cena na noč za šotor (v €)</b></label>
                        <input type="text" placeholder="Vnesi ceno na noč za šotor" id="cena" required>
                    </div>

                    <div class="form-content">
                        <label for="slika">Slika kampa</label><br><br>
                        <input type="file" class="slika-kampa" id="slika" accept="image/*" onchange="readURL(this)">
                    </div>

                    <div class="gumba">
                        <button type="button" class="cancel" onclick="hideForm()">Prekliči</button>
                        <button type="button" class="confirm" onclick="addCamp()">Vpis</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="prikaz" class="info" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div id="prikaz1" class="info1">
            </div>

            <div id="prikaz2" class="info2">
            </div>
        </div>
        <div id="media">
            <hr>
            <audio id="mysong" src="audio/plovi.ogg" controls preload="metadata">
                <p>Your browser doesn't support html5 audio.</p>
            </audio><br>
            <button type="button" onclick="switchSong()">ZAMENJAJ SKLADBO</button>
        </div>
    </main>

    <footer id='foot'>
        <br>
        <hr>
        <p>&copy; 2019 - Anže Luzar<p>
                <hr>
                <button type="button" class="cancel" onclick="clearStorage()">ZAČNI ZNOVA</button>
    </footer>
</body>

</html>