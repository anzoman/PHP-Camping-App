<?php

    include("../config/config.php");
    include("../config/userClass.php");
    include("../config/databaseClass.php");

    if ($_POST['id'] != null) {
        DatabaseClass::deleteCampById($_POST['id']);
    }

?>

