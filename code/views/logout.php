<?php
include('../config/config.php');
$session_uid='';
$_SESSION['uid']=''; 
session_destroy();


if(empty($session_uid) && empty($_SESSION['uid']))
{
$url= BASE_URL . "views/index.php";
header("Location: $url");
//echo "<script>window.location='$url'</script>";
}
?>