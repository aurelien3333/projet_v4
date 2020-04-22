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
    <div class="comment">
        <h2 class="">Commentaires</h2>

        <?php
        for ($i = 0; $i < count($comments); $i++) {
            ?>


            <div class="comment__header">
                <span class="comment__header__pseudo"><?= $comments[$i]->getAuthor(); ?></span>
                <span class="comment__header__date">le <?= $comments[$i]->getCommentDateFr(); ?></span>
            </div>
            <div class="comment__content"><?= $comments[$i]->getComment(); ?></div>
            <hr>
            <?php
        }
        ?>

        <div class="comment__add">
            <form action="index.php?action=addComment&amp;postId=<?= $posts->getId(); ?>" class="comment__add_form"
                  method="post">
                <input type="text" id="author_comment" name="author_comment" value="Votre pseudo">
                <label for="content_comment">Rédigez votre commentaire</label>
                <textarea name="content_comment" id="content_comment"></textarea>
                <button type="submit">Poster votre commentaire</button>
            </form>
        </div>


    </div>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
</div>
