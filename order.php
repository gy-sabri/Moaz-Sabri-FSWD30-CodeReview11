<?php
//  ob_start();
 session_start(); // start a new session or continues the previous

 include_once 'dbconnect.php';
   // sanitize user input to prevent sql injection
   $email = trim($_POST['email']);
   $email = strip_tags($email);
   $email = htmlspecialchars($email);
 
   $cars = trim($_POST['cars']);
   $cars = strip_tags($cars);
   $cars = htmlspecialchars($cars);
 
   $resUser = mysqli_query($conn, "SELECT userId FROM users WHERE email_user ='$email'");
   $row = mysqli_fetch_array($resUser, MYSQLI_ASSOC);
   $count = mysqli_num_rows($resUser); // if uname/pass correct it returns must be 1 row
   $userId = $row['userId'];
 
 
   $resStatus = mysqli_query($conn, "SELECT status FROM cars WHERE carsId ='$cars'");
   $row = mysqli_fetch_array($resStatus, MYSQLI_ASSOC);
   $count = mysqli_num_rows($resStatus);
   $status = $row['status'];

 $error = false;
 if ( isset($_POST['btn-add']) ) {

  if ($status == 'reserved') {
    $errMSG = "Sorry this Cars In advance reserved";
} else {
     // if there's no error, continue to signup
  if( !$error ) {
    $add = "INSERT INTO orders(fk_userId,fk_carsId) VALUES('$userId','$cars')";
    $res = mysqli_query($conn, $add);
 
    if ($res) {
     $errTyp = "success";
     $errMSG = "Booking was successful";
     $x ="UPDATE cars SET status='reserved' WHERE carsId = $cars";
     $y = mysqli_query($conn, $x);
     unset($userId);
     unset($cars);
 
     // echo "<script> window.location.assign('home.php'); </script>";
    } else {
     $errTyp = "danger";
     $errMSG = "Sorry there was a problem confirming your email.";
    }
 //    exit;
  }
 }
}

?>


<center class="container" style="margin-top:60px">
<?php if ( isset($errMSG) ) { ?>
            <div class="alert"> <?php echo $errMSG; ?> </div> 
        <?php } ?>
  
    <form id="office1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    <div id="layout" class="res_box">
        <div class="form-row text-left">
            <label>Your Email:</label>
            <input type="text" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-row text-left">
            <div class="form-group col-md-6">
                <label>Hertz Autovermietung: Kärntner Ring 17, 1010 Wien</label>
                <label>Name Cars:</label>
                <select class='form-control' name='cars'>
                    <?php  $cars = "SELECT carsId,model FROM cars WHERE fk_officeId = '1'";
                        $result = mysqli_query($conn, $cars);
                        // fetch a next row (as long as there are some) into $row
                        while($row = mysqli_fetch_assoc($result)) {
                            printf("
                            <option value='%s'>%s</option>",
                            $row["carsId"],$row["model"],$row["status"],$row["location"]);
                        }
                    ?>
                </select>
            </div>
            <!--  -->
        </div>
        <button type="submit" class="btn btn-light" name="btn-add">Sign Up</button>
        <button type="submit" class="btn btn-danger"  onclick="off_res()">Close</button>
        </div>
    </form>

    <form id="office2" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <div id="layout" class="res_box container">
        <div class="form-row text-left">
            <label>Your Email:</label>
            <input type="text" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-row text-left">
            <div class="form-group col-md-6">
                <label> Ring 17, 1010 Wien</label>
                <label>Name Cars:</label>
                <select class='form-control' name='cars'>
                    <?php  $cars = "SELECT carsId,model FROM cars WHERE fk_officeId = '2'";
                        $result = mysqli_query($conn, $cars);
                        // fetch a next row (as long as there are some) into $row
                        while($row = mysqli_fetch_assoc($result)) {
                            printf("
                            <option value='%s'>%s</option>",
                            $row["carsId"],$row["model"],$row["status"],$row["location"]);
                        }
                    ?>
                </select>
            </div>
            <!--  -->
        </div>
        <button type="submit" class="btn btn-light" name="btn-add">Sign Up</button>
        <button type="submit" class="btn btn-danger"  onclick="off_res()">Close</button>
        </div>
    </form>

    <form id="office3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <div id="layout" class="res_box container">
        <div class="form-row text-left">
            <label>Your Email:</label>
            <input type="text" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-row text-left">
            <div class="form-group col-md-6">
                <label> Ring 17, 1010 Wien</label>
                <label>Name Cars:</label>
                <select class='form-control' name='cars'>
                    <?php  $cars = "SELECT carsId,model FROM cars WHERE fk_officeId = '3'";
                        $result = mysqli_query($conn, $cars);
                        // fetch a next row (as long as there are some) into $row
                        while($row = mysqli_fetch_assoc($result)) {
                            printf("
                            <option value='%s'>%s</option>",
                            $row["carsId"],$row["model"],$row["status"],$row["location"]);
                        }
                    ?>
                </select>
            </div>
            <!--  -->
        </div>
        <button type="submit" class="btn btn-light" name="btn-add">Sign Up</button>
        <button type="submit" class="btn btn-danger"  onclick="off_res()">Close</button>
        </div>
    </form>

    <form id="office4" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <div id="layout" class="res_box container">
        <div class="form-row text-left">
            <label>Your Email:</label>
            <input type="text" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-row text-left">
            <div class="form-group col-md-6">
                <label> Ring 17, 1010 Wien</label>
                <label>Name Cars:</label>
                <select class='form-control' name='cars'>
                    <?php  $cars = "SELECT carsId,model FROM cars WHERE fk_officeId = '4'";
                        $result = mysqli_query($conn, $cars);
                        // fetch a next row (as long as there are some) into $row
                        while($row = mysqli_fetch_assoc($result)) {
                            printf("
                            <option value='%s'>%s</option>",
                            $row["carsId"],$row["model"],$row["status"],$row["location"]);
                        }
                    ?>
                </select>
            </div>
            <!--  -->
        </div>
        <button type="submit" class="btn btn-light" name="btn-add">Sign Up</button>
        <button type="submit" class="btn btn-danger"  onclick="off_res()">Close</button>
        </div>
    </form>

    <form id="office5" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <div id="layout" class="res_box container">
        <div class="form-row text-left">
            <label>Your Email:</label>
            <input type="text" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-row text-left">
            <div class="form-group col-md-6">
                <label> Ring 17, 1010 Wien</label>
                <label>Name Cars:</label>
                <select class='form-control' name='cars'>
                    <?php  $cars = "SELECT carsId,model FROM cars WHERE fk_officeId = '5'";
                        $result = mysqli_query($conn, $cars);
                        // fetch a next row (as long as there are some) into $row
                        while($row = mysqli_fetch_assoc($result)) {
                            printf("
                            <option value='%s'>%s</option>",
                            $row["carsId"],$row["model"],$row["status"],$row["location"]);
                        }
                    ?>
                </select>
            </div>
            <!--  -->
        </div>
        <button type="submit" class="btn btn-light" name="btn-add">Sign Up</button>
        <button type="submit" class="btn btn-danger"  onclick="off_res()">Close</button>
        </div>
    </form>


    <?php ob_end_flush(); ?>
  
</center>