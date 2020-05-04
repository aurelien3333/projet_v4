<!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#">
<head>
    <!--  Meta   -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Jean Forteroche" content="Site officiel de Jean Forteroche"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="all"/>
    <title>Jean Forteroche</title>
    <!--  Balises Open graph pour Facebook  -->
    <meta property="og:url" content="http://localhost/"/>
    <meta property="og:title" content="Site officiel de Jean Forteroche"/>
    <meta property="og:description" content="Retrouvez toute l'actualité de Jean Forteroche"/>
    <meta property="og:image" content="http://localhost/public/img/jean_forteroche.jpg"/>
    <!--  Balises Twiter Card pour Twitter  -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Site officiel de Jean Forteroche">
    <meta name="twitter:url" content="http://www.localhost">
    <meta name="twitter:description" content="Retrouvez toute l'actualité de Jean Forteroche">
    <meta name="twitter:image" content="http://localhost/public/img/jean_forteroche.jpg">
    <!-- Balises css, js, fontawesome, tiniyMCE et google font    -->
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
                        <a class='footer__content__menu__items' href='/admin'>Aller sur l'admin</a>
                        <a class='footer__content__menu__items' href='/readPost'>Rediger un article</a>
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