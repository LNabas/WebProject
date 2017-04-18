<?php
require_once '../../dist/inc/bootstrap.php';
require_once '../../dist/inc/functions.php';

// Je veux récupérer l'utilisateur
if(!empty($_POST)){

    $errors = array();

    $db = App::getDatabase();
    $validator = new Validator($_POST);
    $validator->isAlpha('username', "votre pseudo n'est pas valide");
    if($validator->isValid()){
        $validator->isUniq('username', $db,'users','ce pseudo est deja pris');
    }
    $validator->isEmail('email', "votre email n'est pas valide");
    if($validator->isValid()){
        $validator->isUniq('email', $db,'users',"Cet email est déjà utilisé pour un autre compte");
    }
    $validator->isConfirmed('password', "vous devez rentrer un mot de passe valide");

    if($validator->isValid()){

        App::getAuth()->register($db, $_POST['username'], $_POST['password'], $_POST['email']);
        Session::getInstance()->setFlash('success', 'un email de confirmation vous a été envoyé pour valider votre compte');
        App::redirect('login.php');

    }else{
        $errors = $validator->getErrors();
    }


}
?>

<?php require '../../dist/inc/headerSignup.php'; ?>

<h1> S'inscrire </h1>


<?php if(!empty($errors)): ?>

    <div class="alert alert-danger">

        <p> Vous n'avez pas rempli le formulaire correctement</p>

        <ul>

            <?php foreach ($errors as $errors): ?>

                <li> <?= $errors; ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

<?php endif; ?>


<form action="" method="POST">

    <div class="form-group">

        <label for="">Pseudo</label>
        <input type="text" name="username" class="form-control" required/>

    </div>


    <div class="form-group">

        <label for="">Email</label>
        <input type="text" name="email" class="form-control"  required/>

    </div>


    <div class="form-group">

        <label for="">mot de passe</label>
        <input type="password" name="password" class="form-control"  required/>

    </div>

    <div class="form-group">

        <label for="">confirmer votre mot de passe</label>
        <input type="password" name="password_confirm" class="form-control"  required/>

    </div>

    <button type="submit" class="btn btn-primary">M'inscrire</button>



</form>

<?php require '../../dist/inc/footer.php'; ?>
