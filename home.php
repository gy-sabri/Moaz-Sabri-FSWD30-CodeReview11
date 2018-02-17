<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';

  // if session is not set this will redirect to login page
  if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
  }

  // select logged-in users detail
  $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
  $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!-- Start Page -->
<?php require_once 'navbar.php'; ?>

<?php require_once 'content.php'; ?>
<?php require_once 'cars_locations.php'; ?>

<!-- Footer -->
<?php require_once 'footer.php'; ?>

<?php ob_end_flush(); ?>