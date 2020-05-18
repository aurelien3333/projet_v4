<?php ob_start(); ?>

    <p class="error">Erreur 404 page introuvable</p>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>