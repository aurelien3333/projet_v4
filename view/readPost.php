<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="../public/css/style.css" rel="stylesheet" />
    <link href="../public/css/reset.css" rel="stylesheet"/>
</head>

<body>
<h1>Mon super blog !</h1>
<p>Rédiger un article</p>

<form action="index.php?action=addPost" method="post">
    <label for="title_post">Titre</label>
    <br />
    <input type="text" id="title_post" name="title_post">
    <br />
    <label for="author_post">Auteur</label>
    <br />
    <input type="text" id="author_post" name="author_post">
    <br />
    <label for="content_post">Redigez votre article</label>
    <br />
    <textarea id="content_post" name="content_post"></textarea>
    <br />
    <button type="submit">Publier</button>
</form>


</body>
</html>