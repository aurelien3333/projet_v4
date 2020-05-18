<?php ob_start(); ?>
<main>
<h2 class="list-post__titre">Derniers chapitres publiés</h2>
<div class="list-post box">

    <?php foreach ($posts as $post) : ?>
        <article class="list-post__posts">
            <a class="list-post__posts__link" href="/article/<?= $post->getId()?>/<?= $post->getSlug()?>"><h3 class="list-post__posts__titre">
                <?= htmlspecialchars($post->getTitle()); ?>
            </h3></a>
            <div class="list-post__posts__titre__date">le <?= $post->getCreationDateFr(); ?></div>
            <p class="list-post__contenu__posts">
                <?= strip_tags(substr($post->getContent(), 0, 400)); ?>
            </p>
            <a class="list-post__contenu__posts__btn-lire-la-suite"
               href="/article/<?= $post->getSlug()?>/<?= $post->getId()?>"><?= $post->getTitle(); ?> (suite)</a>
            <hr class="list-post__trait">
        </article>
    <?php endforeach; ?>
</div>
</main>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>

