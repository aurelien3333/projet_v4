<!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#">
<head>
    <!--  Meta   -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="Jean Forteroche" content="Site officiel de Jean Forteroche"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="all"/>
    <title>Jean Forteroche</title>
    <!--  Balises Open graph pour Facebook  -->
    <meta property="og:url" content="http://jean-forteroche.fr/"/>
    <meta property="og:title" content="Site officiel de Jean Forteroche"/>
    <meta property="og:description" content="Retrouvez toute l'actualité de Jean Forteroche"/>
    <meta property="og:image" content="http://jean-forteroche.fr/public/img/jean_forteroche.jpg"/>
    <!--  Balises Twiter Card pour Twitter  -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Site officiel de Jean Forteroche">
    <meta name="twitter:url" content="http://jean-forteroche.fr/">
    <meta name="twitter:description" content="Retrouvez toute l'actualité de Jean Forteroche">
    <meta name="twitter:image" content="http://jean-forteroche.fr/public/img/jean_forteroche.jpg">
    <!-- Balises css, js, fontawesome, tiniyMCE et google font    -->
    <base href="http://jean-forteroche.fr//"/>
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
    <header class="header">
        <div class="header__logo">
            <img src="/public/img/logo_blanc.png" alt="logo" class="header__logo__img">
            <h1 class="header__logo__titre">Billet simple<br/>pour l'Alaska</h1>
        </div>
        <nav class='header__menu'>";
            <a class='header__menu__item' href='/home'>Accueill</a>
            <a class='header__menu__item' href='/articles'>Chapitres</a>
            <a class='header__menu__item' href='/biographie'>Biographie</a>
            <?php if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])): ?>
                <a class='header__menu__item' href='/admin'>Aller sur l'admin</a>
                <a class='header__menu__item' href='/readPost'>Rediger un article</a>
                <a class='header__menu__item' href='/removeConnexion'>Déconnexion</a>
            <?php endif; ?>
        </nav>
    </header>

    <?= $content ?>

    <footer class="footer">
        <div class="footer__content">
            <div class="footer__content__plan">
                <h3 class="footer__content__titre">Plan du site</h3>
                <nav class="footer__content__menu">
                    <a href="/home" class="footer__content__menu__items">Accueil</a>
                    <a href="/biographie" class="footer__content__menu__items">Biographie</a>
                    <a href="/articles" class="footer__content__menu__items">Chapitres</a>
                </nav>
            </div>
            <div class="footer__content__social">
                <h3 class="footer__content__titre">Mes réseaux</h3>
                <nav class="footer__content__menu">
                    <a href="https://www.facebook.com" class="footer__content__menu__items" target="_blank">Facebook</a>
                    <a href="https://www.twitter.com" class="footer__content__menu__items" target="_blank">Twitter</a>
                    <a href="https://www.instagram.com" class="footer__content__menu__items" target="_blank">Instagram</a>
                </nav>
            </div>
            <div class="footer__content_admin">
                <h3 class="footer__content__titre">Admin</h3>
                <nav class="footer__content__menu">
                    <?php if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])): ?>
                        <a class='footer__content__menu__items' href='/admin'>Aller sur l'admin</a>
                        <a class='footer__content__menu__items' href='/readPost'>Rediger un article</a>
                        <a class='footer__content__menu__items' href='/removeConnexion'>Déconnexion</a>
                    <?php else: ?>
                        <a class="footer__content__menu__items" href='/connexion'>Connexion</a>
                    <?php endif; ?>
                </nav>
            </div>

        </div>
        <p class="footer__copyright">
            Copyright © Aurélien Verdeau - 2019. Tous droits réservés
        </p>
    </footer>
</div>
</body>

</html>