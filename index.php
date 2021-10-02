<?php
?>
<!doctype html>
<html lang="cs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="icon2/css/all.css" rel="stylesheet">
    <link href="mystyle.css" rel="stylesheet">


    <title>Petr Lízal</title>



</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light" aria-label="Ninth navbar example" style="background-color: rgb(255, 255, 255);">
            <div class="container-xl">


                <a class="navbar-brand" href="#"> <i class="fal fa-user" style="padding-right: 7px;"></i>Petr Lízal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample07XL">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Úvodní stránka</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Knihy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">O mne</a>
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

    </header>




    <main>


        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url(img/t1.jpg);">
                    <div class="zigzag"></div>

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url(img/t2.jpg);">
                    <div class="zigzag"></div>



                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url(img/t3.jpg);">
                    <div class="zigzag"></div>




                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
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










        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <p><i class="fas fas fa-eye" style="font-size: 45px"></i></p>

                    <h2>Heading</h2>
                    <p class="fw-light">Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                    <a class="btn btn-outline-secondary" href="#" role="button">Zobrazit &raquo;</a>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <p><i class="fas fa-comment-dots" style="font-size: 45px"></i></p>

                    <h2>Heading</h2>
                    <p class="fw-light">Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                    <a class="btn btn-outline-secondary" href="#" role="button">Zobrazit &raquo;</a>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <p><i class="fas fa-comment-dots" style="font-size: 45px"></i></p>



                    <h2>Heading</h2>
                    <p class=" fw-light">And lastly this, the third column of representative placeholder content.</p>
                    <a class="btn btn-outline-secondary" href="#" role="button">Zobrazit &raquo;</a>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->












        <div class="container px-4 py-5" id="featured-3">
            <h2 class="pb-2 border-bottom">Tipy a zajímavosti</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-4">



                <div class="feature col">
                    <p><img src="http://petrlizal.com/res/380/240?img=/_files/news-images/15125517_incident-in-new-baghdad.png" alt="" class="img-fluid" /></p>
                    <h3 class="fs-5">Návod jak utéct z domova</h3>
                    <p class="fw-light lh-base">Odchod či takzvaný útěk z domova může být v určitém případe smysluplné řešení.</p>

                    <a class="btn btn-outline-secondary" href="#" role="button">Zobrazit</a>
                </div>

                <div class="feature col">
                    <p><img src="http://petrlizal.com/res/380/240?img=/_files/news-images/11191012_turris-omnia-plech.jpg.c86614e06e72cce2bba1d0c3d58e5cfd.jpg" alt="" class="img-fluid" /></p>
                    <h3 class="fs-5">Více než jen router</h3>
                    <p class="fw-light">Domácí router je nezbytný pro připojení k Internetu, ale většinu času je </p>

                    <a class="btn btn-outline-secondary" href="#" role="button">Zobrazit</a>
                </div>


                <div class="feature col">
                    <p><img src="http://petrlizal.com/res/380/240?img=/_files/news-images/15280916_sausages-in-a-dressing-gown-1405207-1920.jpg" alt="" class="img-fluid" /></p>
                    <h3 class="fs-5">Návod jak utéct z domova</h3>
                    <p class="fw-light">Odchod či takzvaný útěk z domova může být v určitém případe smysluplné</p>

                    <a class="btn btn-outline-secondary" href="#" role="button">Zobrazit</a>
                </div>

                <div class="feature col">
                    <p><img src="http://petrlizal.com/res/380/240?img=/_files/news-images/13220929_novena.jpg" alt="" class="img-fluid" /></p>
                    <h3 class="fs-5">Návod jak utéct z domova</h3>
                    <p class="fw-light">Odchod či takzvaný útěk z domova může být v určitém případe smysluplné řešení. </p>

                    <a class="btn btn-outline-secondary" href="#" role="button">Zobrazit</a>
                </div>


                <div class="feature col">
                    <p><img src="http://petrlizal.com/res/380/240?img=/_files/news-images/14213520_zerophone-debugging-jpg-project-body.jpg" alt="" class="img-fluid" /></p>
                    <h3 class="fs-5">Návod jak utéct z domova</h3>
                    <p class="fw-light">Odchod či takzvaný útěk z domova může být v určitém případe.</p>

                    <a class="btn btn-outline-secondary" href="#" role="button">Zobrazit</a>
                </div>


                <div class="feature col">
                    <p><img src="http://petrlizal.com/res/380/240?img=/_files/news-images/12134102_trezor-3.jpg" alt="" class="img-fluid" /></p>
                    <h3 class="fs-5">Nestátní peníze</h3>
                    <p class="fw-light">První nejdůvěryhodnější hardware peněženka - Trezor One</p>

                    <a class="btn btn-outline-secondary" href="#" role="button">Zobrazit</a>
                </div>



    </main>




    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>