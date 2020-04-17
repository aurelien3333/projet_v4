<?php ob_start(); ?>

<div class="home">
<h2 class="home__titre">Derniers billets du blog</h2>


<?php
while ($donnees = $posts->fetch())
{
    ?>
    <div class="posts">
        <h3 class="home__posts__titre">
            <?php echo htmlspecialchars($donnees['title']); ?>
            <span class="home__posts__titre__date">le <?php echo $donnees['creation_date_fr']; ?></span>
        </h3>


        <p class="home__contenu__posts">
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
</div>
