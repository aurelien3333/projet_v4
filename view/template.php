<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Mon blog</title>
    <link href="../public/css/style.css" rel="stylesheet"/>
    <link href="../public/css/reset.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Josefin+Slab&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/5fe9b3ed11.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="header">
    <div class="header__logo">
    <img src="./public/img/logo_blanc.png" alt="" class="header__logo__img">
    <h1 class="header__logo__titre">Carnet de note <br/>d'un écrivain</h1>
    </div>
    <div class="header__menu">
        <a class="header__menu__item" href="./index.php?action=admin">Aller sur l'admin</a>
    </div>
</div>

<?= $content ?>

</body>
</html>