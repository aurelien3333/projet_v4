
<?php ob_start(); ?>

<p>Rédiger un article</p>

<form action="index.php?action=updatePost&amp;id=<?= $post->getId();?>" method="post">
    <label for="title_post">Titre</label>
    <br />
    <input type="text" id="title_post" name="title_post" value="<?= $post->getTitle();?>">
    <br />
    <label for="author_post">Auteur</label>
    <br />
    <input type="text" id="author_post" name="author_post" value="<?= $post->getAuthor();?>">
    <br />
    <label for="content_post">Redigez votre article</label>
    <br />
    <textarea id="content_post" name="content_post"><?= $post->getContent();?></textarea>
    <br />
    <button type="submit">Publier</button>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>