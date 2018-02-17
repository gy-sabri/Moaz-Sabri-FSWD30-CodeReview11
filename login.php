<?php
ob_start();
session_start();
require 'dbconnect.php';

 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
    header("Location: home.php");
    exit;
   }

 $error = false;

 if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
 
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // prevent sql injections / clear user invalid inputs
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }

  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {
   $password = hash('sha256', $pass); // password hashing using SHA256 
    $res = mysqli_query($conn, "SELECT userId, first_name, password_user FROM users WHERE email_user ='$email'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

   if( $count == 1 && $row['password_user']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }

  }

 }

?>
<center id="login_box">
  <div id="layout" class="login_box">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <?php if ( isset($errMSG) ) { echo $errMSG; ?> <?php } ?>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" placeholder="Your Email" aria-describedby="emailHelp" value="<?php echo $email; ?>" maxlength="40" required />
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
            <span class="text-danger"><?php echo $emailError; ?></span>
          </small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" required/>
          <span class="text-danger"><?php echo $passError; ?></span>
        </div>
        <div class="form-check row2">
          <input type="checkbox" class="form-check-input" checked>Keep me logged in
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-light" name="btn-login">Sign In</button>
        <button type="submit" class="btn btn-danger"  onclick="off_login()">Close</button>
    </form>
    <?php ob_end_flush(); // ====================== End Login ========================== ?>
  </div>
</center>