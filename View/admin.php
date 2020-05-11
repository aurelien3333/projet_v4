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

            <?php for ($i = 0; $i < count($posts); $i++) : ?>
                <tr class="admin__tableau__core">
                    <td><a href="/article/<?= $posts[$i]->getSlug() ?>/<?= $posts[$i]->getId() ?>"><?= $posts[$i]->getTitle(); ?></a></td>
                    <td><?= $posts[$i]->getCreationDateFr(); ?></td>
                    <td><?= $posts[$i]->getAuthor(); ?></td>
                    <td><?= count($commentManager->getListByPostId($posts[$i]->getId())); ?> Commentaire(s)</td>
                    <td>
                        <a href="/article/<?= $posts[$i]->getSlug() ?>/<?= $posts[$i]->getId() ?>"
                           title="Voir l'article"><i
                                    class="far fa-eye tableau_admin__btn"></i></a>
                        <a href="./modifiedPost/<?= $posts[$i]->getId() ?>"
                           title="Modifier l'article"><i class="far fa-edit tableau_admin__btn"></i></a>
                        <a href="/removePost/<?= $posts[$i]->getId() ?>" title="Effacer l'article"><i
                                    class="far fa-trash-alt tableau_admin__btn"></i></a>
                    </td>
                </tr>
            <?php endfor; ?>
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

            <?php for ($i = 0; $i < count($comments); $i++) : ?>

                <?php if ($comments[$i]->getReport() === 'oui') : ?>

                    <tr class="admin__tableau__core">
                        <td class="report"><?= $comments[$i]->getAuthor() ?></td>
                        <td class="report"><?= $comments[$i]->getCommentDateFr() ?></td>
                        <td class="report"><a href="/article/<?= $comments[$i]->getSlugPost() ?>/<?= $comments[$i]->getPostId() . '#' . $comments[$i]->getId()?>"><?= $comments[$i]->getComment() ?></a></td>
                        <td class="report"><?= $comments[$i]->getTitlePost(); ?></td>
                        <td>
                            <a href="/article/<?=$comments[$i]->getSlugPost() ?>/<?= $comments[$i]->getPostId() . '#' . $comments[$i]->getId()?>"><i
                                        class="far fa-eye tableau_admin__btn"></i></a>
                            <a href="/removeComment/<?= $comments[$i]->getId() ?>" title="Effacer le commentaire">
                                <i class="far fa-trash-alt tableau_admin__btn"></i></a>
                        </td>
                    </tr>
                <?php else : ?>
                   <!-- <?/*= '<pre>' */?>
                    <?php /*var_dump($comments[$i]);*/?>
                    --><?/*= '<pre>'; die();*/?>
                    <tr class="admin__tableau__core">
                        <td><?= $comments[$i]->getAuthor() ?></td>
                        <td><?= $comments[$i]->getCommentDateFr() ?></td>
                        <td><a href="/article/<?= $comments[$i]->getSlugPost() ?>/<?= $comments[$i]->getPostId() . '#' . $comments[$i]->getId()?>"><?= $comments[$i]->getComment() ?></a></td>
                        <td><?= $comments[$i]->getTitlePost(); ?></td>
                        <td>
                            <a href="/article/<?= $comments[$i]->getSlugPost() ?>/<?= $comments[$i]->getPostId() . '#' . $comments[$i]->getId()?>"><i
                                        class="far fa-eye tableau_admin__btn"></i></a>
                            <a href="/removeComment/<?= $comments[$i]->getId() ?>" title="Effacer l'article">
                                <i class="far fa-trash-alt tableau_article_admin__delete"></i></a>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endfor; ?>
        </table>
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>