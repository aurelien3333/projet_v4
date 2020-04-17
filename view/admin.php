<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<a href="./index.php?action=readPost">Rediger un article</a>
<table>
<tr class="tableau_article_admin_entete">
    <td>Titre</td>
    <td>Date de création</td>
    <td>Aperçu</td>
    <td>Voir l'article</td>
    <td>Voir comentaire</td>
    <td>Editer</td>
    <td>Supprimer</td>
</tr>

<?php
while ($donnees = $posts->fetch()) {
    ?>
    <br/>
    <tr class="tableau_article_admin">
        <td><?=htmlspecialchars($donnees['title'])?></td>
        <td><?=$donnees['creation_date_fr']?></td>
        <td>**</td>
        <td>**</td>
        <td>**</td>
        <td>**</td>
        <td>**</td>
    </tr>
    <?php
}
$posts->closeCursor();
?>
</table>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>