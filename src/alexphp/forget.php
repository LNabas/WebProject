<?php
require 'inc/bootstrap.php';
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
<?php require 'inc/header.php';?>

<h1>Mot de passe oublié</h1>

<form action="" method="POST">

    <div class="form-group">
        <label for="">Email</label>
        <input type="emi" name="email" class="form-control" required/>
    </div>

    <button type="submit" class="btn btn-primary">réinitialisé mon mot de passe</button>

</form>

<?php require 'inc/footer.php'; ?>