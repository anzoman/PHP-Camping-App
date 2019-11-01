<?php

include("../config/config.php");
include("../config/databaseClass.php");

echo DatabaseClass::getCamps($_GET['naziv'], intval($_GET['cena']), $_GET['kraj']);


