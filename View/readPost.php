<?php ob_start(); ?>

<form action="/addPost" method="post" class="addpost">

    <label for="title_post" class="addpost__label">Titre de l'article</label>
    <input type="text" id="title_post" name="title_post" class="addpost__input" required>
    <label for="author_post" class="addpost__label">Auteur</label>
    <input type="text" id="author_post" name="author_post" class="addpost__input" required>
    <label for="content_post" class="addpost__label">Redigez votre article</label>
    <textarea id="mce" name="content_post"></textarea>
    <button type="submit" class="addpost__button">Publier</button>
</form>

<script type="text/javascript" src="/public/js/tinymce.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
