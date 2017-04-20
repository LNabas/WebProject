<?php
require_once 'inc/db.php';

$requser = $bdd->prepare("SELECT * FROM images");
$requser->execute(array());







if(!empty($_POST))
{

    $target_dir = "C:/wamp64/www/PROJET_WEB/img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }





    $target_file = $target_dir."/".$_FILES["fileToUpload"]["name"];
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


    $insertphoto = $bdd->prepare("INSERT INTO images(image) VALUES (?)");
    $insertphoto->execute(array($_FILES['fileToUpload']['name']));


    header('location: photos.php');

}



?>
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


<?php
while($user = $requser->fetch())
{?>
    <div class="container">

        <div class="gallerie">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-5">
                    <a href="img/<?php echo $user->image; ?>" data-title="testa" data-lightbox="Vacation">
                        <div class="image" style="background-image:url(img/<?php echo $user->image; ?>)"><img src="img/<?php echo $user->image; ?>"   />
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <?php
}
?>


<div class="formulaire">
    <form method="post" action="" enctype="multipart/form-data" class="col-lg-6 col-lg-push-4" id="ajoutimg">


        <label for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />

        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />

        <input type="file" name="fileToUpload"  /><br />


        <input type="submit" name="submit" value="Envoyer" />

    </form>

</div>

<?php require_once 'inc/footer.php';  ?>

</body>
</html>