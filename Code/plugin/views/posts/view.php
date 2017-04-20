<?php
/**
* Récupération de l'article
**/
if (!isset($_GET['slug'])) {
    throw new Exception('404');
}
$q = $bdd->prepare('SELECT * FROM posts WHERE slug = :slug');
$q->execute(['slug' => $_GET['slug']]);
$post = $q->fetch();
if (!$post) {
    throw new Exception('404');
}

/**
* Nos commentaires
**/
use Plugin\Plugin\Comments;
$comments_cls = new Comments($bdd);
// Soumission d'un commentaire
$errors = false;
$success = false;
if (isset($_POST['action']) && $_POST['action'] == 'comment') {
    $save = $comments_cls->save('posts', $post->id);
    if($save){
        $success = true;
    }else{
        $errors = $comments_cls->errors;
    }
}
$comments = $comments_cls->findAll('posts', $post->id);


/**
* CONTENU
**/
?>



<?= $post->content; ?>

<h2><?= $comments_cls->count; ?> Commentary</h2>

<?php if ($errors): ?>
    <div class="alert alert-danger">
        <strong>Impossible to send your commentary</strong> for this reasons:
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><?= $error; ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>
<?php if ($success): ?>
    <div class="alert alert-success">
        <strong>Bravo</strong> Your commentary was sent
    </div>
<?php endif ?>
<form action="#comment" role="form" method="post" id="comment">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" class="form-control" name="username" required />
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required/>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label>Commentary</label>
                <textarea class="form-control" name="content" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </div>
        <input type="hidden" name="parent_id" value="0" id="parent_id"/>
        <input type="hidden" name="action" value="comment"/>
    </div>
</form>

<p>&nbsp;</p>

<?php foreach ($comments as $comment): ?>
    <?php require ELEMENTS . 'comment.php'; ?>
    <?php foreach ($comment->replies as $comment): ?>
        <div style="margin-left:100px;">
            <?php require ELEMENTS . 'comment.php'; ?>
        </div>
    <?php endforeach ?>
<?php endforeach ?>
