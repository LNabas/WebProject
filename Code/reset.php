<?php
require 'inc/autoloader.php';
if(isset($_GET['id']) && isset($_GET['token'])){
    $auth = App::getAuth();
    $db = App::getDatabase();
    $user = $auth->checkResetToken($db, $_GET['id'], $_GET['token']);
    if($user){
        if(!empty($_POST)){
            $validator = new Validator($_POST);
            $validator->isConfirmed('password');
            if($validator->isValid()){
                $password = $auth->hashPassword($_POST['password']);
                $db->query('UPDATE users SET password = ?, reset_at = NULL , reset_token = NULL WHERE id = ?', [$password, $_GET['id']]);
                $auth->connect($user);
                Session::getInstance()->setFlash('success',"Your password has been changed");
                App::redirect('account.php');
            }
        }
    }else{
        Session::getInstance()->setFlash('danger',"This token is invalid");
        App::redirect('login.php');
    }
}else{
    App::redirect('login.php');
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



<h1>Reset password</h1>







<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="#" class="active" id="login-form-link">New password</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="" method="POST" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="new password" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirm" class="form-control" placeholder="confirm new password" value="">
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