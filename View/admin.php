<?php ob_start(); ?>
    <a href="./index.php?action=readPost">Rediger un article</a>
    <h2 class="admin__article__titre">Gestion des articles</h2>
    <table>
        <tr class="tableau_article_admin_entete">
            <td>Titre</td>
            <td>Date de création</td>
            <td>Aperçu</td>
            <td>Auteur</td>
            <td>Comentaire</td>
            <td>Gestion article</td>
        </tr>


        <?php for ($i = 0; $i < count($posts); $i++) : ?>
            <tr class="tableau_article_admin">
                <td><?= $posts[$i]->getTitle(); ?></td>
                <td><?= $posts[$i]->getCreationDateFr(); ?></td>
                <td><?= strip_tags(substr($posts[$i]->getContent(), 0, 200)); ?></td>
                <td><?= $posts[$i]->getAuthor(); ?></td>
                <td><?= count($commentManager->getListByPostId($posts[$i]->getId())); ?> Commentaire(s)</td>
                <td>
                    <a href="./index.php?action=singlePost&amp;id=<?= $posts[$i]->getId() ?>" title="Voir l'article"><i
                                class="far fa-eye tableau_article_admin__view"></i></a>
                    <a href="./index.php?action=modifiedPost&amp;id=<?= $posts[$i]->getId() ?>"
                       title="Modifier l'article"><i class="far fa-edit tableau_article_admin__edit"></i></a>
                    <a href="./index.php?action=removePost&amp;id=<?= $posts[$i]->getId() ?>" title="Effacer l'article"><i class="far fa-trash-alt tableau_article_admin__delete"></i></a>
                </td>
            </tr>
        <?php endfor; ?>
    </table>
    <h2 class="admin__article__titre">Gestion des commentaires</h2>
    <table>
        <tr class="tableau_article_admin_entete">
            <td>Auteur</td>
            <td>Date</td>
            <td>Commentaire</td>
            <td>Article</td>
            <td>Action</td>
        </tr>
        <?php

        for ($i = 0; $i < count($comments); $i++) {
            ?>
            <tr class="tableau_comment_admin">
                <td><?= $comments[$i]->getAuthor() ?></td>
                <td><?= $comments[$i]->getCommentDateFr() ?></td>
                <td><?= $comments[$i]->getComment() ?></td>
                <td><?= $comments[$i]->getTitlePost(); ?></td>
                <td>
                    <a href="./index.php?action=removeComment&amp;id=<?= $comments[$i]->getId() ?>" title="Effacer l'article"><i class="far fa-trash-alt tableau_article_admin__delete"></i></a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>