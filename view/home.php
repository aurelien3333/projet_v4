<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="../public/css/style.css" rel="stylesheet" />
</head>

<body>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($donnees = $posts->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?php echo htmlspecialchars($donnees['title']); ?>
            <em>le <?php echo $donnees['creation_date']; ?></em>
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
</body>
</html>