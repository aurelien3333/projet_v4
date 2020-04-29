<?php ob_start(); ?>
<h2 class="list-post__titre">Derniers chapitres publiés</h2>
<div class="list-post box">



    <?php for ($i = 0; $i < count($posts); $i++) : ?>
        <div class="list-post__posts">
            <h3 class="list-post__posts__titre">
                <?= $posts[$i]->getTitle(); ?>
            </h3>
            <div class="list-post__posts__titre__date">le <?= $posts[$i]->getCreationDateFr(); ?></div>
            <p class="list-post__contenu__posts">
                <?= strip_tags(substr($posts[$i]->getContent(), 0, 400)); ?>
            </p>
            <a class="list-post__contenu__posts__btn-lire-la-suite"
               href="./singlePost/<?= $posts[$i]->getId() ?>">Lire la suite</a>
            <hr class="list-post__trait">
        </div>
    <?php endfor; ?>
</div>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>

