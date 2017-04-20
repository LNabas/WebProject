<?php
require 'inc/autoloader.php';
require 'inc/db.php';
App::getAuth()->restrict();

if(!empty($_POST)){

    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        Session::getInstance()->setFlash('danger', "Les mots de passes ne correspondent pas");
    }else{
        $user_id = $_SESSION['auth']->id;
        $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
        require_once 'inc/db.php';
        $bdd->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password,$user_id]);
        Session::getInstance()->setFlash('success', "Votre mot de passe a bien été mis à jour");
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

<h1>Hello <?= $_SESSION['auth']->username;  ?></h1>







<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="#" class="active" id="login-form-link">Change password</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="" method="POST" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="password" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirm"  class="form-control" placeholder="confirm Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" class="form-control btn btn-login" value="change password">
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