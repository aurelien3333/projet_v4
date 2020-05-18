<?php ob_start(); ?>
<main>
<article class="post box">
    <div class="post__header">
        <span class="post__header__date">le <?= $post->getCreationDateFr(); ?></span>
        <span class="post__header__auteur">Par <strong><?= $post->getAuthor(); ?></strong></span>
    </div>
    <hr class="post__trait">
    <h3 class="post__titre">
        <?= $post->getTitle(); ?>
    </h3>
    <div class="post__contenu">
        <?= nl2br($post->getContent()); ?>
    </div>
</article>

<div class="comment__display box">
    <?php if (count($comments) == 0) :
        echo '<h2 class="comment__display__titre"> Soyez le premier à laisser un commentaire</h2>';
    else:
        echo '<h2 class="comment__display__titre" id="comment">' . count($comments) . ' Commentaire(s)</h2>';
    endif; ?>
    <?php foreach ($comments as $comment) : ?>
        <div class="comment__display__pseudo"><?= htmlspecialchars($comment->getAuthor()); ?></div>
        <div class="comment__display__date">le <?= $comment->getCommentDateFr(); ?></div>
        <div class="comment__display__comment" id="<?= $comment->getId(); ?>"><?= htmlspecialchars($comment->getComment()); ?></div>
        <?php if ($comment->getReport() === 'non') : ?>
            <a class="comment__display__btn-report"
               href="/reportComment/<?= $post->getSlug(); ?>/<?= $comment->getId(); ?>/<?= $comment->getPostId(); ?>">Signaler ce
                commentaire</a>
        <?php else: ?>
            <div class="comment__display__btn-report comment__display__btn-report-active">Commentaire signalé</div>
        <?php endif; ?>
        <hr class="comment__display__tr">
    <?php endforeach; ?>
</div>

<div class="comment__add box">
    <h3 class="comment__add__title">Laisser un commentaire</h3>
    <p class="comment__add__text">Les champs obligatoires sont indiqués avec *</p>
    <form action="/addComment/<?= $post->getSlug(); ?>/<?= $post->getId(); ?>" class="comment__add__form" method="post">
        <input type="text" id="author_comment" name="author_comment" placeholder="Nom *"
               class="comment__add__form__pseudo" required>
        <textarea name="content_comment" id="content_comment" placeholder="Rédigez votre commentaire"
                  class="comment__add__form__comment" required></textarea>
        <button type="submit" class="comment__add__form__button">Publier votre commentaire</button>
    </form>
</div>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>


