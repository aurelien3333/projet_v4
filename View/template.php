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
<div class="header">
    <div class="header__navbar">
        <div class="header__navbar__logo">
            <img src="/public/img/logo_blanc.png" alt="logo" class="header__navbar__logo__img">
            <h1 class="header__navbar__logo__titre">Carnet de note de <br/>Jean Forteroche</h1>
        </div>
        <?php if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])): ?>
            <div class='header__navbar__menu'>";
                <a class='header__navbar__menu__item' href='/listPosts'>Billets</a>
                <a class='header__navbar__menu__item' href='/admin'>Aller sur l'admin</a>
                <a class='header__navbar__menu__item' href='/readPost'>Rediger un article</a>
                <a class='header__navbar__menu__item' href='/removeConnexion'>Déconnexion</a>
            </div>
        <?php else: ?>
            <div class='header__navbar__menu'>
                <a class='header__navbar__menu__item' href='/listPosts'>Billets</a>
                <a class='header__navbar__menu__item' href='/connexion'>Connexion</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="footer">
rtrtretysssssttyty
</div>
<?= $content ?>
</body>
</html>