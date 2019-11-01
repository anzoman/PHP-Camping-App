<?php
if (!isset($_SESSION['uid'])) {
    include('../config/userClass.php');
    $userClass = new userClass();
}
?>