<?php include 'settings.php'; //include settings ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SIMPLE USER</title>
  </head>
  <body>
    <h1>This is User page</h1>
    <h2>Hello: <?php $ufunc->UserName(); //Show user name who is in session?></h2>
    <a href="../../includes/logout.php">Logout</a>
  </body>
</html>
