<?php ob_start(); ?>

<div class="post">
    <div class="post__header">
        <h3 class="post__header__titre">
            <?= $post->getTitle(); ?>
        </h3>
        <span class="post__header__date">le <?= $post->getCreationDateFr(); ?></span>
    </div>
    <div class="post__contenu">
        <?= nl2br($post->getContent()); ?>
    </div>

</div>

<div class="comment">
    <div class="comment__add">
        <h3 class="comment__add__title">Laisser un commentaire</h3>
        <p class="comment__add__text">Les champs obligatoires sont indiqués avec *</p>
        <form action="/addComment/<?= $post->getId(); ?>" class="comment__add__form" method="post">
            <input type="text" id="author_comment" name="author_comment" placeholder="Nom *"
                   class="comment__add__form__pseudo">
            <textarea name="content_comment" id="content_comment" placeholder="Rédigez votre commentaire"
                      class="comment__add__form__comment"></textarea>
            <button type="submit" class="comment__add__form__button">Publier votre commentaire</button>
        </form>
    </div>

    <?php if (count($comments) == 0) :
        echo '<h2 class=""> Soyez le premier à laisser un commentaire</h2>';
    else:
        echo '<h2 class=""><?= count($comments); ?> Commentaire</h2>';
    endif; ?>
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


