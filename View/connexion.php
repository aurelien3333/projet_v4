<?php ob_start(); ?>


<div class="connexion">
    <form action="/newConnexion" class="connexion__form" method="post">
        <input type="text" placeholder="pseudo" name="user_pseudo">
        <input type="password" placeholder="Mots de passe" name="user_pwd">
        <button type="submit">Connexion</button>
    </form>
</div>



    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
