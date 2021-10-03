<?php
?>
<!doctype html>
<html lang="cs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Průvodce dětí">
    <link rel="shortcut icon" href="admin/favicon.ico">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="icon2/css/all.css" rel="stylesheet">
    <link href="mystyle.css" rel="stylesheet">

    <title>Průvodce dětí</title>

</head>

<body>

    <aside>

        <nav class="navbar navbar-expand-lg  navbar-light" aria-label="Ninth navbar example" style="background-color: rgb(255, 255, 255);">

            <div class="container-xl" style="margin-top: 10px; margin-bottom: 10px;">


                <a class="navbar-brand" href="#"> <i class="fal fa-user" style="padding-right: 7px;"></i>Průvodce dětí</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample07XL">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Úvodní stránka</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Knihy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">O mne</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="galerie.php">Galerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Platební možnosti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontakt</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


    </aside>
    <header>




        <!--//slide-->
        <div id="myCarousel" class="carousel slide mb-0" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">


                <div class="carousel-item active" style="background-image: url(img/t4.jpg);">
                    <div class="zigzag"></div>
                    <div class="container">
                        <div class="carousel-caption text-caption"> <?php /* text-start, text-caption  text-end */  ?>


                            <h1 class="" style="text-transform: uppercase">Jsem průvodce pro mladé dobrodruhy</h1>
                            <p class="text-caption" style="text-transform: uppercase">Putujeme přírodou a učíme se novým dovednostem</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>


                <!--//slide dvojka-->
                <div class="carousel-item" style="background-image: url(img/t5.jpg);">
                    <div class="zigzag"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="" style="text-transform: uppercase">Nabízím zážitky na celý život</h1>
                            <p style="text-transform: uppercase">výlety I expedice I vzdělávací kurzy</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <!--//slide dvojka end-->
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
        <!--//slide end-->

    </header>