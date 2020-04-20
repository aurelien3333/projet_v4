<?php ob_start(); ?>

<div class="home">
    <h2 class="home__titre">Derniers billets du blog</h2>


    <?php

    for ($i = 0; $i < count($posts); $i++) {
        ?>
        <div class="home__posts">
            <h3 class="home__posts__titre">
                <?= $posts[$i]->getTitle(); ?>
                <span class="home__posts__titre__date">le <?= $posts[$i]->getCreationDateFr(); ?></span>
            </h3>


            <p class="home__contenu__posts">
                <?= substr($posts[$i]->getContent(), 0, 500); ?>
                <a class="home__contenu__posts__btn-lire-la-suite"
                   href="./index.php?action=singlePost&amp;id=<?= $posts[$i]->getId() ?>">Lire la suite</a>
            </p>
        </div>

        <?php
    }
    ?>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</div>
