<?php 
    session_start(); // start a new session or continues the previous

    include_once 'dbconnect.php'
    include_once 'login.php';
    include_once 'navbar.php';
?>
<center class="mt-70 container">
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">offices</th>
      <th scope="col">Address</th>
      <th scope="col">Model Cars</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $cars = "SELECT name,address,model,status FROM cars LEFT JOIN offices ON fk_officeId = officesId ORDER BY name,address";
    $cars_result = mysqli_query($conn, $cars);
    while($row = mysqli_fetch_assoc($cars_result)) {
        printf("<tr>
                    <th scope='row'>%s</th>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                </tr>",
                $row["name"],$row["address"],$row["model"],$row["status"]);
    }?>
  </tbody>
</table>
</center>

<?php require_once 'footer.php'; ?>
