<?php
require 'inc/autoloader.php';

if(!empty($_POST) && !empty($_POST['email'])){
    $db = App::getDatabase();
    $auth = App::getAuth();
    $session = Session::getInstance();
    if($auth->resetPassword($db, $_POST['email'])){
        $session->setFlash('success', 'Les instructions du rappel du mot de passe vous ont été envoyées par email');
        App::redirect('login.php');
    }else{
        $session->setFlash('danger', 'Aucun compte ne correspond à cet adresse');
    }
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





<div class="container">

    <?php if(Session::getInstance()->hasFlashes()): ?>
        <?php foreach (Session::getInstance()->getFlashes() as $type => $message): ?>
            <div class="alert alert-<?= $type; ?>">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>



    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="#" class="active" id="login-form-link">Write your email to reset your password</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="" method="POST" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Username or email" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" class="form-control btn btn-login" value="Reset password">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>