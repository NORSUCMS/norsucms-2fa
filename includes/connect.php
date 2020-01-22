<?php
$dbhost = "localhost"; //Host
$dbuser = "root"; //Database user
$dbpass = "123456"; //Database password
$dbname = "norsucms-2fa"; //Database name
$conn = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname"); //Connection
mysqli_set_charset($conn,"utf8"); //UTF-8 for Turkish letters
?>
