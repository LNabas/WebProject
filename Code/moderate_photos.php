<?php
require 'inc/autoloader.php';
require 'inc/db.php';
App::getAuth()->restrict();




$requser = $bdd->prepare("SELECT * FROM images");
$requser->execute(array());

if(!empty($_POST))
{
    $delete = $bdd->prepare("DELETE FROM images WHERE image = ?");
    $delete->execute(array($_POST['pictures']));
    header('location: moderate_photos.php');
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



<form method="post" action="" enctype="multipart/form-data" class="col-lg-6 col-lg-push-4" id="ajoutimg">

    <select name="pictures">
        <?php while($user = $requser->fetch())
        { ?>
            <option value="<?php echo $user->image ?>"><?php echo $user->image ?></option>
        <?php } ?>
    </select>

    <input type="submit" name="submit" value="Envoyer" />

</form>


</body>
</html>


