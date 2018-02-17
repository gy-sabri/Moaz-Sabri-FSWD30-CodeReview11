<?php
 ob_start();
 session_start(); // start a new session or continues the previous
 $_SESSION['UserName'] = 'Hello User';

 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php"); // redirects to home.php
  }
  
 include_once 'dbconnect.php';

 $error = false;
 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection

  $first_name = trim($_POST['first_name']);
  $first_name = strip_tags($first_name);
  $first_name = htmlspecialchars($first_name);

  $last_name = trim($_POST['last_name']);
  $last_name = strip_tags($last_name);
  $last_name = htmlspecialchars($last_name);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
 
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $birth_date = trim($_POST['birth_date']);
  $birth_date = strip_tags($birth_date);
  $birth_date = htmlspecialchars($birth_date);

  $gender = trim($_POST['gender']);
  $gender = strip_tags($gender);
  $gender = htmlspecialchars($gender);

// Start the session
  $_SESSION["UserName"] = $first_name;

// basic last_name validation
if (empty($first_name)) {
    $error = true;
    $first_nameError = "Please enter your full name.";
   } else if (strlen($first_name) < 3) {
    $error = true;
    $first_nameError = "Name must have atleat 3 characters.";
   } else if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
    $error = true;
    $first_nameError = "Name must contain alphabets and space.";
   }


// basic last_name validation
  if (empty($last_name)) {
    $error = true;
    $last_nameError = "Please enter your full name.";
   } else if (strlen($last_name) < 3) {
    $error = true;
    $last_nameError = "Name must have atleat 3 characters.";
   } else if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
    $error = true;
    $last_nameError = "Name must contain alphabets and space.";
   }

  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check whether the email exist or not
   $query = "SELECT email_user FROM users WHERE email_user ='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }

  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;

   $passError = "Password must have atleast 6 characters.";
  }

  // password encrypt using SHA256();
  $password = hash('sha256', $pass);

  // if there's no error, continue to signup
  if( !$error ) {
   $query = "INSERT INTO users(first_name,last_name,password_user,email_user,birth_date,gender) VALUES('$first_name','$last_name','$password','$email','$birth_date','$gender')";
   $res = mysqli_query($conn, $query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($first_name);
    unset($last_name);
    unset($email);
    unset($pass);
    unset($birth_date);
    unset($gender);
    // echo "<script> window.location.assign('home.php'); </script>";
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }

   
  }
 }

?>


<center id="reg_box">
  <div id="layout" class="reg_box">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <?php if ( isset($errMSG) ) { ?>
            <div class="alert"> <?php echo $errMSG; ?> </div> 
        <?php } ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">First Name:</label>
                <input type="text" class="form-control" placeholder="First name" name="first_name" required>
                <!--  -->
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Last Name:</label>
                <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
                <!--  -->
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Password:</label>
                <input type="password" name="pass" class="form-control" placeholder="Enter Password" required/>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" required/>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Gender:</label>
                <select class="form-control" name="gender">
                    <option value="other" id="">other</option>
                    <option value="female" id="">female</option>
                    <option value="male" id="">male</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputZip">Birth Date:</label>
                <input type="date" class="form-control" placeholder="Address" name="birth_date">
                <!--  -->
            </div>
        </div>
        <button type="submit" class="btn btn-light" name="btn-signup">Sign Up</button>
        <button type="submit" class="btn btn-danger"  onclick="off()">Close</button>
    </form>
    <?php ob_end_flush(); ?>
  </div>
</center>
