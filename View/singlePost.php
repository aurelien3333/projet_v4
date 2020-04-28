<?php ob_start(); ?>

<div class="home">
    <h2 class="home__titre">Derniers billets du blog</h2>


    <div class="posts">
        <h3 class="home__posts__titre">
            <?= $post->getTitle(); ?>
            <span class="home__posts__titre__date">le <?= $post->getCreationDateFr(); ?></span>
        </h3>


        <div class="home__contenu__posts">
            <?= nl2br($post->getContent());
            ?>
        </div>
    </div>
    <div class="comment">

        <div class="comment__add">
            <h3 class="comment__add__title">Laisser un commentaire</h3>
            <p class="comment__add__text">Votre adreese de messagerie ne sera pas publiée. Les champs obligatoires sont
                indiqués avec *</p>
            <form action="/addComment/<?= $post->getId(); ?>" class="comment__add__form" method="post">
                <input type="text" id="author_comment" name="author_comment" placeholder="Nom *"
                       class="comment__add__form__pseudo">
                <input type="email" id="email_comment" name="email_comment" placeholder="Adresse de messagerie *"
                       class="comment__add__form__email">
                <textarea name="content_comment" id="content_comment" placeholder="Rédigez votre commentaire"
                          class="comment__add__form__comment"></textarea>
                <button type="submit" class="comment__add__form__button">Publier votre commentaire</button>
            </form>
        </div>
        <h2 class=""><?= count($comments); ?> Commentaire</h2>
        <?php for ($i = 0; $i < count($comments); $i++) : ?>
            <div class="comment__display">
                <span class="comment__display__pseudo"><?= $comments[$i]->getAuthor(); ?></span>
                <span class="comment__display__date">le <?= $comments[$i]->getCommentDateFr(); ?></span>
            </div>
            <div class="comment__display__comment"><?= $comments[$i]->getComment(); ?></div>
            <hr class="comment__display_tr">
        <?php endfor; ?>
    </div>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>

</div>
