<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Mon blog</title>
    <base href="http://localhost/"/>
    <link href="public/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Josefin+Slab&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/5fe9b3ed11.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/1n8csunmkzvlgckt4jn8mfm5ynt3kf6dpelgp5kqrqwq1kb8/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
</head>
<body>
<div class="main">
    <div class="header">
        <div class="header__logo">
            <img src="/public/img/logo_blanc.png" alt="logo" class="header__logo__img">
            <h1 class="header__logo__titre">Billet simple<br/>pour l'Alaska</h1>
        </div>
        <div class='header__menu'>";
            <a class='header__menu__item' href='/home'>Accueill</a>
            <a class='header__menu__item' href='/listPosts'>Chapitres</a>
            <a class='header__menu__item' href='/biographie'>Biographie</a>
            <?php if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])): ?>
                <a class='header__menu__item' href='/admin'>Aller sur l'admin</a>
                <a class='header__menu__item' href='/readPost'>Rediger un article</a>
                <a class='header__menu__item' href='/removeConnexion'>Déconnexion</a>
            <?php endif; ?>
        </div>

    </div>

    <?= $content ?>

    <div class="footer">
        <div class="footer__content">
            <div class="footer__content__plan">
                <h3 class="footer__content__titre">Plan du site</h3>
                <div class="footer__content__menu">
                    <a class="footer__content__menu__items">Accueil</a>
                    <a class="footer__content__menu__items">Biographie</a>
                    <a class="footer__content__menu__items">Chapitres</a>
                    <a class="footer__content__menu__items">Contact</a>
                </div>
            </div>
            <div class="footer__content__social">
                <h3 class="footer__content__titre">Mes réseaux</h3>
                <div class="footer__content__menu">
                    <a class="footer__content__menu__items">Facebook</a>
                    <a class="footer__content__menu__items">Twitter</a>
                    <a class="footer__content__menu__items">Instagram</a>
                </div>
            </div>
            <div class="footer__content_admin">
                <h3 class="footer__content__titre">Admin</h3>
                <div class="footer__content__menu">
                    <?php if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])): ?>
                        <a class='footer__content__menu__items' href='/removeConnexion'>Déconnexion</a>
                    <?php else: ?>
                        <a class="footer__content__menu__items" href='/connexion'>Connexion</a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <p class="footer__copyright">
            Copyright © Aurélien Verdeau - 2019. Tous droits réservés
        </p>
    </div>
</div>
</body>

</html>