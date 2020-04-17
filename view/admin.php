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
while ($donnees = $posts->fetch()) {
    ?>
    <br/>
    <tr class="tableau_article_admin">
        <td><?=htmlspecialchars($donnees['title'])?></td>
        <td><?=$donnees['creation_date_fr']?></td>
        <td>**</td>
        <td><?=$donnees['author']?></td>
        <td>14 Commentaire(s) Voir</td>
        <td>
            <a href="" title="Voir l'article"><i class="far fa-eye tableau_article_admin__view"></i></a>
            <a href="" title="Modifier l'article"><i class="far fa-edit tableau_article_admin__edit"></i></a>
            <a href="./index.php?action=removePost&amp;id=<?= $donnees['id'] ?>" title="Effacer l'article"><i class="far fa-trash-alt tableau_article_admin__delete"></i></a>
        </td>
    </tr>
    <?php
}
$posts->closeCursor();
?>
</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>