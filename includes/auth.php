<?php
session_start();
include_once 'connect.php';
include_once 'functions.php';
$login = new Login;
$login->CheckAuth();
?>
