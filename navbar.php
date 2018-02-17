<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Theme Made By www.w3schools.com - No Copyright -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Basic Website</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="main.css">
        <style>
            .button_login {
                position: absolute;
                z-index: 1;
                bottom: 30%;
                width: 100%;
            }

            .button_login h1 {
                color: rgba(255, 255, 255, 0.8);
                margin-bottom: 10%;
                font-weight: bolder
            }

            .button_login button {
                padding: 15px 30px;
                box-shadow: 0px 1px 3px 5px #3333;
                background-color: rgba(0, 0, 0, 0.456);
                color: #eee;
                font-size: 24px;
                transition: all .3s ease-in-out;
            }.button_login button:hover {
                box-shadow: 0px 0px 0px 0px #fff;
            }.button_login button:visited{
                box-shadow: 5px 1px 2px 5px #fff;
            }
        </style>
    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Moaz Sabri CR 11 </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Offiecs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"><button id='button' class='btn nav-item' onclick='res1()'>Peugeot</button></a>
                            <a class="dropdown-item"><button id='button' class='btn nav-item' onclick='res2()'>Hertz Autovermietung</button></a>
                            <a class="dropdown-item"><button id='button' class='btn nav-item' onclick='res3()'>Elite Rent-a-Car GmbH</button></a>
                            <a class="dropdown-item"><button id='button' class='btn nav-item' onclick='res4()'>Cash4Car</button></a>
                            <a class="dropdown-item"><button id='button' class='btn nav-item' onclick='res5()'>Lucky Car - DER Spezialist</button></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="form-inline my-2 my-lg-0">
                <?php
                    session_start(); // start a new session or continues the previous
                    if(isset($_SESSION['user'])!="" ){
                        echo "<a href='logout.php?logout'><button type='button' class='btn btn-light'>Sign Out</button></a>";
                    } else {
                        echo "<button type='button' class='btn btn-light' onclick='on_login()'>Login</button>";
                    }
                ?>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        