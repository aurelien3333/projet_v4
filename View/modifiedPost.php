

<?php ob_start(); ?>


<form action="/updatePost/<?= $post->getId();?>" method="post">
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
    <textarea id="mce" name="content_post"><?= $post->getContent();?></textarea>
    <br />
    <button type="submit">Publier</button>
</form>

<script>
	tinymce.init({
		selector: 'textarea#mce',
		toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent'

	});
</script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>