<?php ob_start(); ?>

<div class="home">
    <h2 class="home__titre">Derniers billets du blog</h2>


        <div class="posts">
            <h3 class="home__posts__titre">
                <?= $posts->getTitle(); ?>
                <span class="home__posts__titre__date">le <?= $posts->getCreationDateFr(); ?></span>
            </h3>


            <p class="home__contenu__posts">
                <?= nl2br($posts->getContent());
                ?>
            </p>
        </div>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</div>
