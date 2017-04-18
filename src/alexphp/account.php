<?php
require '../../dist/inc/bootstrap.php';
App::getAuth()->restrict();
if(!empty($_POST)){

    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";
    }else{
        $user_id = $_SESSION['auth']->id;
        $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
        require_once 'db.php';
        $pdo->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password,$user_id]);
        $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
    }

}
require '../../dist/inc/headerSignup.php';
?>

<h1>Bonjour <?= $_SESSION['auth']->username;  ?></h1>


<form action="" method="post">
    <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="changer de mot passe"/>
    </div>

    <div class="form-group">
        <input class="form-control" type="password" name="password_confirm" placeholder="confirmation du mot passe"/>
    </div>

    <button class="btn btn-primary">changer de mot de passe</button>
</form>

<?php require '../../dist/inc/footer.php'; ?>

