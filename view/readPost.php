
<?php ob_start(); ?>



<p>Rédiger un article</p>

<form action="index.php?action=addPost" method="post">
    <label for="title_post">Titre</label>
    <br />
    <input type="text" id="title_post" name="title_post">
    <br />
    <label for="author_post">Auteur</label>
    <br />
    <input type="text" id="author_post" name="author_post">
    <br />
    <label for="content_post">Redigez votre article</label>
    <br />
    <textarea id="mce" name="content_post"></textarea>
    <br />
    <button type="submit">Publier</button>
</form>

<script>
	tinymce.init({
		selector: 'textarea#mce',
		toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
		entity_encoding : "raw"
	});
</script>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>