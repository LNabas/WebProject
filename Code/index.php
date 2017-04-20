<!DOCTYPE html>
<html lang="en">
<head>

    <title>BDE EXIA Lyon</title>
    <?php require_once 'inc/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/stylephoto.css">


</head>

<body>
<?php require_once 'inc/header.php'; ?>

<h1 style="margin-left: 10%;">Welcome on the CESI BDE website</h1>
<div class="container main-container">


    <div id="mycarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mycarousel" data-slide-to="1"></li>
            <li data-target="#mycarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <!-- First slide -->
            <div class="item active bgcolor">

                <div class="carousel-caption">

                    <img src="img/exiaphoto1.jpeg" class="d-block img-fluid" data-animation="animated bounceInLeft">

                    <h3 data-animation="animated bounceInRight">
                        Nuit de l'info
                    </h3>

                </div>
            </div> <!-- /.item -->

            <!-- Second slide -->
            <div class="item bgcolor">
                <div class="carousel-caption">
                    <img src="img/exiaphoto2.jpeg" class="d-block img-fluid" data-animation="animated bounceInLeft">

                    <h3 data-animation="animated bounceInRight">
                        Promotion 2020
                    </h3>
                </div>
            </div><!-- /.item -->

            <!-- Third slide -->
            <div class="item bgcolor">
                <div class="carousel-caption">
                    <img src="img/exiaphoto3.jpeg" class="d-block img-fluid" data-animation="animated bounceInLeft">

                    <h3 data-animation="animated bounceInRight">
                        4L Trophy
                    </h3>
                </div>
            </div><!-- /.item -->

        </div><!-- /.carousel-inner -->

        <!-- Controls -->
        <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /.carousel -->

</div><!-- /.container -->




</body>
</html>