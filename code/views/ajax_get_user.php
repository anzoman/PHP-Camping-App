<?php

include("../config/config.php");
include("../config/databaseClass.php");

echo DatabaseClass::getUserById($_GET['user_id']);