<?php
include("../config/config.php");
include("../config/databaseClass.php");

$int_value = ctype_digit($_POST['cena']) ? intval($_POST['cena']) : null;

if (!empty($_POST['naziv']) && !empty($_POST['opis']) && strlen($_POST['opis']) > 20 && !empty($_POST['kraj']) && !empty($_POST['cena']) && $int_value !== null) {
    databaseClass::insertNewCamp($_POST['naziv'], $_POST['opis'], $_POST['cena'], $_POST['kraj'], $_POST['slika'], $_SESSION['uid']);
    echo "KAMP JE BIL USPEŠNO DODAN!";
    header("Location: avtokampi_signed.php");
} else {
    header("Location: avtokampi_add.php");
}
