<div class="comment row" style="margin:10px 0;">
    <div class="col-xs-2">
        <img src="http://www.gravatar.com/avatar/<?= md5($comment->email); ?>" width="100%">
    </div>
    <div class="col-xs-10">
        <p>
            <strong><?= htmlentities($comment->username); ?>, </strong>
            <em><?= date('d/m/Y', strtotime($comment->created)); ?></em>
            <a href="#" class="reply" data-id="<?= $comment->parent_id ? $comment->parent_id : $comment->id; ?>">Répondre</a>
        </p>
        <p>
            <?= htmlentities($comment->content); ?>
        </p>
    </div>
</div>