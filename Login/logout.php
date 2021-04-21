<?php
include '../config.php';
session_start();
$_SESSION =[];
session_unset();
session_destroy();
header('location:/tanganid/login/login.php');
exit;
?>