<?php
$q = $bdd->query('SELECT * FROM posts');
$posts = $q->fetchAll();
?>

<h1>Events</h1>

<ul>
<?php foreach ($posts as $post): ?>
    <li>
        <a href="forum.php?p=posts.view&slug=<?= $post->slug; ?>">
            <?= $post->name; ?>
        </a>
    </li>
<?php endforeach ?>
</ul>