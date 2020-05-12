<?php ob_start(); ?>
<main>
    <h2 class="admin__titre">Gestion des articles</h2>
    <div class="admin__tableau">
        <table>
            <tr class="admin__tableau__header">
                <td>Titre</td>
                <td>Date de création</td>
                <td>Auteur</td>
                <td>Comentaire</td>
                <td>Action</td>
            </tr>

            <?php foreach ($posts as $post) : ?>
                <tr class="admin__tableau__core">
                    <td><a href="/article/<?= $post->getSlug() ?>/<?= $post->getId() ?>"><?= $post->getTitle(); ?></a></td>
                    <td><?= $post->getCreationDateFr(); ?></td>
                    <td><?= $post->getAuthor(); ?></td>
                    <td><?= count($commentManager->getListByPostId($post->getId())); ?> Commentaire(s)</td>
                    <td>
                        <a href="/article/<?= $post->getSlug() ?>/<?= $post->getId() ?>"
                           title="Voir l'article"><i
                                    class="far fa-eye tableau_admin__btn"></i></a>
                        <a href="./modifiedPost/<?= $post->getId() ?>"
                           title="Modifier l'article"><i class="far fa-edit tableau_admin__btn"></i></a>
                        <a href="/removePost/<?= $post->getId() ?>" title="Effacer l'article"><i
                                    class="far fa-trash-alt tableau_admin__btn"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <h2 class="admin__titre">Gestion des commentaires</h2>


    <div class="admin__tableau">

            <?php if (count($comments) === 0) : ?>
                <p class="admin__text">Aucun commentaire pour l'instant</p>
            <?php else : ?>
        <p class="admin__text">Les commentaires affichés en rouge ont été signalés par un utilisateur.</p>
        <table>
            <tr class="admin__tableau__header">
                <td>Auteur</td>
                <td>Date</td>
                <td>Commentaire</td>
                <td>Article</td>
                <td>Action</td>
            </tr>
            <?php endif; ?>

            <?php foreach ($comments as $comment) : ?>

                <?php if ($comment->getReport() === 'oui') : ?>

                    <tr class="admin__tableau__core">
                        <td class="report"><?= $comment->getAuthor() ?></td>
                        <td class="report"><?= $comment->getCommentDateFr() ?></td>
                        <td class="report"><a href="/article/<?= $comment->getSlugPost() ?>/<?= $comment->getPostId() . '#' . $comment->getId()?>"><?= $comment->getComment() ?></a></td>
                        <td class="report"><?= $comment->getTitlePost(); ?></td>
                        <td>
                            <a href="/article/<?=$comment->getSlugPost() ?>/<?= $comment->getPostId() . '#' . $comment->getId()?>"><i
                                        class="far fa-eye tableau_admin__btn"></i></a>
                            <a href="/removeComment/<?= $comment->getId() ?>" title="Effacer le commentaire">
                                <i class="far fa-trash-alt tableau_admin__btn"></i></a>
                        </td>
                    </tr>
                <?php else : ?>
                    <tr class="admin__tableau__core">
                        <td><?= $comment->getAuthor() ?></td>
                        <td><?= $comment->getCommentDateFr() ?></td>
                        <td><a href="/article/<?= $comment->getSlugPost() ?>/<?= $comment->getPostId() . '#' . $comment->getId()?>"><?= $comment->getComment() ?></a></td>
                        <td><?= $comment->getTitlePost(); ?></td>
                        <td>
                            <a href="/article/<?= $comment->getSlugPost() ?>/<?= $comment->getPostId() . '#' . $comment->getId()?>"><i
                                        class="far fa-eye tableau_admin__btn"></i></a>
                            <a href="/removeComment/<?= $comment->getId() ?>" title="Effacer l'article">
                                <i class="far fa-trash-alt tableau_article_admin__delete"></i></a>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach; ?>
        </table>
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>