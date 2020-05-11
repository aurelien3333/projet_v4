<?php ob_start(); ?>
<main>
<h2 class="list-post__titre">Derniers chapitres publiés</h2>
<div class="list-post box">

    <?php for ($i = 0; $i < count($posts); $i++) : ?>
        <article class="list-post__posts">
            <a class="list-post__posts__link" href="/article/<?= $posts[$i]->getId()?>/<?= $posts[$i]->getSlug()?>"><h3 class="list-post__posts__titre">
                <?= $posts[$i]->getTitle(); ?>
            </h3></a>
            <div class="list-post__posts__titre__date">le <?= $posts[$i]->getCreationDateFr(); ?></div>
            <p class="list-post__contenu__posts">
                <?= strip_tags(substr($posts[$i]->getContent(), 0, 400)); ?>
            </p>
            <a class="list-post__contenu__posts__btn-lire-la-suite"
               href="/article/<?= $posts[$i]->getSlug()?>/<?= $posts[$i]->getId()?>"><?= $posts[$i]->getTitle(); ?> (suite)</a>
            <hr class="list-post__trait">
        </article>
    <?php endfor; ?>
</div>
</main>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>

