<?php
 session_start(); // start a new session or continues the previous

 include_once 'dbconnect.php';
 include_once 'order.php';
 ?>
<div class="container">
    <button id='button' class='btn btn-dark m-1' onclick='res1()'>Peugeot</button>
    <button id='button' class='btn btn-light m-1' onclick='res2()'>Hertz Autovermietung</button>
    <button id='button' class='btn btn-dark m-1' onclick='res3()'>Elite Rent-a-Car GmbH</button>
    <button id='button' class='btn btn-light m-1' onclick='res4()'>Cash4Car</button>
    <button id='button' class='btn btn-dark m-1' onclick='res5()'>Lucky Car - DER Spezialist</button>
    <div class="row">
        <?php
                    
            $cars = "SELECT * FROM cars LEFT JOIN offices ON fk_officeId = officesId ORDER BY name,address";
            $cars_result = mysqli_query($conn, $cars);
            while($row = mysqli_fetch_assoc($cars_result)) {
                printf("<div class='card m-2' style='width: 18rem;'>
                            <img class='card-img-top w-100 h-50' src='%s' alt='Card image cap'>
                            <div class='card-body'>
                                <h5 class='card-title'>Model: %s</h5>
                                <p class='card-text'>office: %s.</p>
                                <p class='card-text'>Address: %s.</p>
                                <p class='card-text'>location Car: %s.</p>
                                <p class='card-text'>Status: %s.</p>
                            </div>
                        </div>",
                        $row["url_img"],$row["model"],$row["name"],$row["address"],$row["location"],$row["status"]);
        }?>
    </div>
</div>
