<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<!--carnet de note d'un ecrivain-->

<p>Derniers billets du blog :</p>
<a href="./index.php?action=admin">Aller sur l'admin</a>

<?php
while ($donnees = $posts->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?php echo htmlspecialchars($donnees['title']); ?>
            <em>le <?php echo $donnees['creation_date_fr']; ?></em>
        </h3>

        <p>
            <?php
            echo nl2br(htmlspecialchars($donnees['content']));
            ?>
        </p>
    </div>
    <?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>