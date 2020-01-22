<?php
  //include settings and auth functions
  include 'settings.php';
  $auth->SAM();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Musa Abbasov">
  <title>NORSU CMS 2FA</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <div class="container">
    <div class="row rwcenter">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Confirm</h5>
            <form class="form-signin" action="includes/auth.php" method="POST">
              <div class="form-label-group">
                <input name="authcode" type="number" id="auth" class="form-control" placeholder="Auth Code" required autofocus>
                <label for="auth">Auth Code</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
