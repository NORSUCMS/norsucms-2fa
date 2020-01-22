<?php
session_start();
include_once 'connect.php';
include_once 'functions.php';
$check = new Login;
$check->SessionVerify();
$check->SessionCheck();
$check->UserType();
?>
