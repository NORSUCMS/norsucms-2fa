<?php
class Login{
  function GAC($length) {
      $result = '';
      for($i = 0; $i < $length; $i++) {
          $result .= mt_rand(0, 9);
      }
      return $result;
  }
  public function SAM(){
    global $conn;
    $email = $_SESSION['login'];
    $authcode = $this->GAC(4);
    $sql = "INSERT INTO auth (login,authcode) VALUES ('".$email."','".$authcode."')";
    if ($conn->query($sql)) {
      require_once 'sendmail.php';
    }
  }
  public function LoginSystem(){
    global $conn;
    session_start();
    $error = '';
    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $query = "SELECT login, password FROM users WHERE login=? AND password=? LIMIT 1";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ss", $email, $password);
      $stmt->execute();
      $stmt->bind_result($email, $password);
      $stmt->store_result();
      if($stmt->fetch()) {
        $_SESSION['login'] = $email;
        header("Location:../auth.php");
      }else {
        header("Location:../index.php?error");
      }
      $conn->close();
    }
  }
  public function CheckAuth(){
    global $conn;
    $email = $_SESSION["login"];
    $getauth = "SELECT * FROM auth WHERE login='$email' && status='0' ORDER BY id DESC LIMIT 1";
    $getauthcode = $conn->query($getauth);
    $authcode = mysqli_fetch_assoc($getauthcode);
    $authinput = $_REQUEST["authcode"];
    if ($authcode["authcode"] == $authinput) {
      $authid = $authcode["id"];
      $updatestatus = "UPDATE auth SET status='1' WHERE id='$authid'";
      $conn->query($updatestatus);
      $conn->close();
      header("Location:checkuser.php");
    }else {
      session_unset();
      session_destroy();
      header("Location:../autherror.php");
    }
  }
  public function SessionVerify(){
    if(isset($_SESSION['login'])){
    header("location: includes/checkuser.php"); // Check user session and role
    }
  }
  public function SessionCheck(){
    global $conn;
    session_start();// Starting Session
    // Storing Session
    $user_check = $_SESSION['login'];
    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT * FROM users WHERE login = '$user_check'";
    $ses_sql = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $_SESSION["id"] = $row["id"];
    $_SESSION["name"] = $row["name"];
    $_SESSION["role"] = $row["role"];
  }
  public function UserType(){
    //if user role is 1, redirect to admin page
    if ($_SESSION["role"] == 1) {
      header("Location:../user/admin/");
    }
    //if user role is 0, redirect to user page
    if ($_SESSION["role"] == 0) {
      header("Location:../user/simpleuser/");
    }
  }
  function GoBack(){
	   header("location:javascript://history.go(-1)");
	    exit;
    }
  }
class UserFunctions{
  public function UserName(){
    $username = $_SESSION["name"];
    echo $username;
  }
}
?>
