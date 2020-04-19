<?php ob_start(); ?>
<a href="./index.php?action=readPost">Rediger un article</a>
<table>
<tr class="tableau_article_admin_entete">
    <td>Titre</td>
    <td>Date de création</td>
    <td>Aperçu</td>
    <td>Auteur</td>
    <td>Comentaire</td>
    <td>Gestion article</td>
</tr>

<?php

for ($i = 0; $i < count($posts); $i++){
?>
    <br/>
    <tr class="tableau_article_admin">
        <td><?=$posts[$i]->getTitle()?></td>
        <td><?=$posts[$i]->getCreationDateFr()?></td>
        <td>**</td>
        <td><?=$posts[$i]->getAuthor()?></td>
        <td>14 Commentaire(s) Voir</td>
        <td>
            <a href="./index.php?action=singlePost&amp;id=<?=$posts[$i]->getId()?>" title="Voir l'article"><i class="far fa-eye tableau_article_admin__view"></i></a>
            <a href="" title="Modifier l'article"><i class="far fa-edit tableau_article_admin__edit"></i></a>
            <a href="./index.php?action=removePost&amp;id=<?=$posts[$i]->getId()?>" title="Effacer l'article"><i class="far fa-trash-alt tableau_article_admin__delete"></i></a>
        </td>
    </tr>
    <?php
}
?>
</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>