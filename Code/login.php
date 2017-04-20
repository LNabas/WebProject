<?php
require_once 'inc/autoloader.php';
$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);
if($auth->user()){
    App::redirect('account.php');
}

if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    $user = $auth->login($db, $_POST['username'], $_POST['password'], isset($_POST['remember']));
    $session = Session::getInstance();
    if($user){
        $session->setFlash('success', "you're connect");
        App::redirect('account.php');
    }else{
        $session->setFlash('danger', 'Incorrect username or password, please confirm your account');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>BDE login</title>
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
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="" method="POST" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username or email" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password"  class="form-control" placeholder="Password">
                                        <label for=""><a href="forget.php">(I forgot my password)</a></label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="remember" value="1"/> Remember me
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" class="form-control btn btn-login" value="Log In">
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