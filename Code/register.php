<?php
require_once 'inc/autoloader.php';
require_once 'inc/functions.php';

// Je veux récupérer l'utilisateur
if(!empty($_POST)){

    $errors = array();

    $db = App::getDatabase();
    $validator = new Validator($_POST);

    $validator->isAlpha('username', "your name isn't ok");
    if($validator->isValid()){
        $validator->isUniq('username', $db,'users','this name is still take');
    }
    $validator->isEmail('email', "your email is invalid");
    if($validator->isValid()){
        $validator->isUniq('email', $db,'users',"this email still exist");
    }
    $validator->isConfirmed('password', "you have to input a valid password");


    if($validator->isValid()){

        App::getAuth()->register($db, $_POST['username'], $_POST['email'], $_POST['password'], $_POST['promotion']);
        Session::getInstance()->setFlash('success', 'we send you a email to confirm your count');
        App::redirect('login.php');

    }else{
        $errors = $validator->getErrors();
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>BDE Register</title>
    <?php require_once 'inc/head.php'; ?>

    <link rel="stylesheet" type="text/css" href="css/style.css">



</head>

<body>
<?php require_once 'inc/header.php'; ?>
<?php if(!empty($errors)): ?>

    <div class="alert alert-danger">

        <p>you have not filled in the form correctly</p>

        <ul>

            <?php foreach ($errors as $errors): ?>

                <li> <?= $errors; ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

<?php endif; ?>



<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs12">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="register-form" action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username" required/>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password" required/>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="">promotion</label>
                                    <select id="promotion" name="promotion" class="form-control">
                                        <option value="A1">A1</option>
                                        <option value="A2">A2</option>
                                        <option value="A3">A3</option>
                                        <option value="A4">A4</option>
                                        <option value="A5">A5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit"  name="remember_token" class="form-control btn btn-register" value="Register Now">
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