<?php
include("../config/config.php");
include("../config/databaseClass.php");

$regex = "/^([0-2][0-9]|(3)[0-1])(\. )(((0)[0-9])|((1)[0-2]))(\. )\d{4}$/";

if (!empty($_POST['user_id']) && !empty($_POST['kamp_id']) && !empty($_POST['od']) && !empty($_POST['do']) && preg_match($regex, $_POST['do']) && preg_match($regex, $_POST['od'])) {
    databaseClass::insertNewReservation($_POST['user_id'], $_POST['kamp_id'], $_POST['od'], $_POST['do'], $_POST['cena']);
    echo "KAMP JE BIL USPEŠNO DODAN!";
    header("Location: nadzorna-plosca.php");
} else {
    header("Location: avtokampi_reservation.php");
}
