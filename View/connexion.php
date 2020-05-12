<?php ob_start(); ?>

<div class="connexion">
    <h3 class="connexion__titre">Identification</h3>
    <form action="/newConnexion" class="connexion__form" method="post">
        <input type="text" placeholder="pseudo" name="user_pseudo" class="connexion__form__pseudo" required>
        <input type="password" placeholder="Mots de passe" name="user_pwd" class="connexion__form__pass" re>
        <button type="submit" class="connexion__form__bouton">Connexion</button>
    </form>
</div>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
