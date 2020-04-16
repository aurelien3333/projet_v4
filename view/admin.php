<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Mon blog</title>
    <link href="../public/css/style.css" rel="stylesheet"/>
    <link href="../public/css/reset.css" rel="stylesheet"/>
</head>

<body>
<h1>Mon super blog !</h1>
<a href="./index.php?action=readPost">Rediger un article</a>
<table>
<tr class="tableau_article_admin_entete">
    <td>Titre</td>
    <td>Date de création</td>
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
        <td><?=$donnees['creation_date']?></td>
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
</body>
</html>