<?php
if(!empty($_POST))
{
    $nom = $_POST['name'];
    $email = $_POST['email'];
    $objet = $_POST['subject'];
    $message = $_POST['message'];

    $who = "bdelyonexia@gmail.com";

    mail($who, $objet, "Nom: $nom   Mail: $email   Subject: $objet  Message:  $message");
    header('location: contactmerci.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>

    <title>BDE EXIA Lyon</title>
    <?php require_once 'inc/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>

<body>
<?php require_once 'inc/header.php'; ?>

<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us <small>Student or organism</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">



                                <label for="name">
                                    Nom</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email</label>
                                <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                    <input type="email" class="form-control" name="email" placeholder="email" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject</label>
                                <select id="subject" name="subject" class="form-control" required="required">
                                    <option value="Selection" selected="">Selection</option>
                                    <option value="demand">want to meet</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="other">other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message">
                                    Message</label>
                                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                          placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend><span class="glyphicon glyphicon-globe"></span>Our location</legend>
                <address>
                    <strong>BDE CESI Ecully.</strong><br>
                    19 avenue Guy de Collongue <br>
                    Ecully, 69130<br>

                </address>

            </form>
        </div>
    </div>
</div>
</body>
</html>