<?php
?>
<!doctype html>
<html lang="cs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Výlety a kurzy pro Vaše děti">
    <meta name="keywords" content="výlety, kurzy, děti">
    <link rel="shortcut icon" href="admin/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="iconpro/css/all.css" rel="stylesheet">
    <link href="mystyle.css" rel="stylesheet">

    <title>Výlety a kurzy pro Vaše děti
    </title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:300,300italic,400,400italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


</head>

<body>






    <div class="container">
        <nav class="d-flex flex-wrap justify-content-center py-3 pt-3">
            <a href="http://dobrodruzi.cz" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">


                <span class="fs-3 text-black">
                    <!--
                        fa-duotone fa-chalkboard-user              
                        fa-light fa-comment-smile
                    fa-regular fa-users-gear
                    <i class="fa-duotone fa-comment-smile"></i>
                    <i class="fa-duotone fa-campfire"></i>
                    <i class="fa-duotone fa-face-awesome"></i>
                    <i class="fa-light fa-campfire"></i>
                --> <i class="fa-light fa-campfire  text-primary" style="font-size: 25px"></i> <b>dobrodruzi<span class=" text-black">.cz</b>

                    <p class="fs-6 text-black">
                        <i>profesionální průvodci a lektoři</i>
                    </p>
                </span>


            </a>

            <ul class="nav nav-pills mt-4">

                <?php if (isset($_GET["page"])) {
                    if ($_GET["page"] == "index") {
                        $active_index = "active";
                    }
                    if ($_GET["page"] == "lektor-petr") {
                        $active_lektori = "active";
                    }

                    if ($_GET["page"] == "o-nas") {
                        $active_onas = "active";
                    }

                    if ($_GET["page"] == "vylety") {
                        $active_vylety = "active";
                    }
                    if ($_GET["page"] == "kurzy-programovani") {
                        $active_kurzy_programovani = "active";
                    }
                    if ($_GET["page"] == "krouzek-programovani") {
                        $active_krouzek_programovani = "active";
                    }

                    if ($_GET["page"] == "kurzy-lukostrelby") {
                        $active_kurzy_lukostrelby = "active";
                    }


                    if ($_GET["page"] == "kurzy-vodactvi") {
                        $active_kurzy_vodactvi = "active";
                    }

                    if ($_GET["page"] == "cenik") {
                        $active_cenik = "active";
                    }
                    if ($_GET["page"] == "kalendar") {
                        $active_kalendar = "active";
                    }
                    if ($_GET["page"] == "galerie") {
                        $active_galerie = "active";
                    }
                    if ($_GET["page"] == "kontakt") {
                        $active_kontakt = "active";
                    }
                }


                if (isset($_GET["sekce"])) {
                    if ($_GET["sekce"] == "nabizime") {
                        $active_nabizime = "active";
                    }
                }




                ?>


                <?php if (!isset($_GET["page"])) {

                    $active_index = "active";
                } ?>


                <li class="nav-item"><a href="index.php?page=index" class="nav-link <?php echo $active_index ?>" aria-current="page">Úvodní stránka</a></li>
                <li class="nav-item dropdown">
                <li class="nav-item"><a href="index.php?page=o-nas" class="nav-link <?php echo $active_onas ?>">O nás</a></li>
                <a class="nav-link dropdown-toggle" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">Nabízíme</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
                    <li><a href="index.php?page=vylety" class="dropdown-item <?php echo $active_vylety ?>">Výlety</a></li>
                    <li><a href="index.php?page=kurzy-programovani" class="dropdown-item <?php echo $active_kurzy_programovani ?>">Kurzy programování</a></li>
                    <li><a href="index.php?page=krouzek-programovani" class="dropdown-item <?php echo $active_krouzek_programovani ?>">Kroužek programování</a></li>
                    <li><a href="index.php?page=kurzy-lukostrelby" class="dropdown-item <?php echo $active_kurzy_lukostrelby ?>">Kurzy lukostřelby</a></li>
                    <li><a href="index.php?page=kurzy-vodactvi" class="dropdown-item <?php echo $active_kurzy_vodactvi ?>">Vodácký výlet</a></li>

                </ul>
                </li>



                <li <li class="nav-item"><a href="index.php?page=cenik" class="nav-link <?php echo $active_cenik ?>">Ceník</a></li>
                <li <li class="nav-item"><a href="index.php?page=kalendar" class="nav-link <?php echo $active_kalendar ?>">Kalendář</a></li>
                <li class="nav-item"><a href="galerie.php?page=galerie" class="nav-link <?php echo $active_galerie ?>">Fotogalerie</a></li>
                <li class="nav-item"><a href="index.php?page=kontakt" class="nav-link <?php echo $active_kontakt ?>">Kontakt</a></li>


            </ul>
        </nav>
    </div>





    <!--


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

            -->

    </nav>




    <header>


        <!--//slide-->
        <div id="myCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">



                <div class="carousel-item active" style="background-image: linear-gradient(rgba(0, 0, 0, 0.1),rgba(0, 0, 0, 0.4)),url('img/slide/slideohen.jpg');">
                    <div class="zigzag"></div>
                    <div class="container">
                        <div class="carousel-caption text-caption"> <?php /* text-start, text-caption  text-end */  ?>


                            <h1 class="display-6 fw-bold" style="text-transform: uppercase; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.6);">Putujeme přírodou a učíme se novým dovednostem</h1>
                            <p class="text-caption" style="text-transform: uppercase; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.6);">Provázíme mladé dobrodruhy na cestách za poznáním</p>
                            <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                        </div>
                    </div>
                </div>



                <!--//slide dvojka-->
                <div class="carousel-item" style="background-image: linear-gradient(rgba(0, 0, 0, 0.0),rgba(0, 0, 0, 0.7)),url('img/slide/slidelod.jpg'); ">
                    <div class="zigzag"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="" style="text-transform: uppercase; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.6);">Nabízíme zážitky na celý život</h1>
                            <p style="text-transform: uppercase; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.6);">výlety I expedice I vzdělávací kurzy</p>
                            <!--<p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>-->
                        </div>
                    </div>
                </div>
                <!--//slide dvojka end-->




                <!--//slide dvojka-->
                <div class="carousel-item" style="background-image: linear-gradient(rgba(0, 0, 0, 0.0),rgba(0, 0, 0, 0.7)),url('img/slide/slidealex.jpg'); ">
                    <div class="zigzag"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="" style="text-transform: uppercase; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.6);">VYTVÁŘÍME PRO DĚTI PŘÍLEŽITOSTI K SEBEROZVOJI</h1>
                            <p style="text-transform: uppercase; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.6);">A TRÁVÍME ČAS VE ZDRAVÉM PROSTŘEDÍ</p>
                            <!--<p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>-->
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