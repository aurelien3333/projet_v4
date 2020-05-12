<?php ob_start(); ?>

    <p class="error"><?= $_SESSION["error"] ?></p>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>