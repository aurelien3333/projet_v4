<?php
session_start();
function LoadClass($classe)
{
    if (file_exists('./Controller/' . $classe . '.php')) {
        require './Controller/' . $classe . '.php';
    } else {
        require './Model/' . $classe . '.php';
    }
}

spl_autoload_register('LoadClass');

$postController = new PostController();
$commentController = new CommentController();
$userController = new UserController();
$viewController = new ViewController();
try {
    //nettoyage $_GET
    $actionClean = isset($_GET['action']) && (string)$_GET['action'] ? filter_var($_GET['action'], FILTER_SANITIZE_STRING) : null;
    $idClean = isset($_GET['id']) && (int)$_GET['id'] > 0 ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : null;
    $postIdClean = isset($_GET['postId']) && (int)$_GET['postId'] > 0 ? filter_var($_GET['postId'], FILTER_SANITIZE_NUMBER_INT) : null;

    //nettoyage $_POST
    if (isset($_POST['title_post'], $_POST['content_post'], $_POST['author_post'])) {
        $postTitleClean = filter_var($_POST['title_post'], FILTER_SANITIZE_STRING);
//        $postContentClean = filter_var($_POST['content_post'], FILTER_SANITIZE_STRING);
        $postContentClean = $_POST['content_post'];
        $postAuthorClean = filter_var($_POST['author_post'], FILTER_SANITIZE_STRING);
    } elseif (isset($_POST['author_comment'], $_POST['content_comment'])) {
        $authorCommentClean = filter_var($_POST['author_comment'], FILTER_SANITIZE_STRING);
        $contentCommentClean = filter_var($_POST['content_comment'], FILTER_SANITIZE_STRING);
    } elseif (isset($_POST['user_pseudo'], $_POST['user_pwd'])) {
        $pseudoClean = filter_var($_POST['user_pseudo'], FILTER_SANITIZE_STRING);
        $passClean = filter_var($_POST['user_pwd'], FILTER_SANITIZE_STRING);
    }

    //Si l'utilisateur est connecté
    $connected = (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])) ? $connected = true : $connected = false;

    //affiche la vue avec l'editeur de text pour ecrire un nouvel article
    $adminController = new AdminController();
    if ($actionClean === 'readPost' && $connected === true) {
        $postController->read();
        //Supprime un commentaire par son id
    } elseif ($actionClean === 'removeComment' && $connected === true) {
        $commentController->remove($idClean);
        //Supprime un post par son id
    } elseif ($actionClean === 'removePost' && $connected === true) {
        $postController->remove($idClean);
        //Ajoute un article avec le contenue du post (titre, autheur, contenu)
    } elseif ($actionClean === 'addPost' && $connected === true) {
        $postController->add($postTitleClean, $postContentClean, $postAuthorClean);
        //Récupére un article par son id est l'affiche dans l'éditeur de texte pour le modifier
    } elseif ($actionClean === 'modifiedPost' && $connected === true) {
        $postController->modified($idClean);
        //met a jour l'article aprés les modifications
    } elseif ($actionClean === 'updatePost' && $connected === true) {
        $postController->update($postTitleClean, $postContentClean, $postAuthorClean, $idClean);
        //affiche l'administration
    } elseif ($actionClean === 'admin' && $connected === true) {
        $admin = new AdminController();
        $admin->display();
        //Déconnecte l'utilisateur
    } elseif ($actionClean === 'removeConnexion' && $connected === true) {
        $userController->deleteConnexion();
        //affiche la liste de tous les articles
    } elseif ($actionClean === 'articles') {
        $postController->list();
        // Récupére les identifiant entré par l'utilisateur et verifie si ils sont valables
    } elseif ($actionClean === 'newConnexion') {
        $userController->check($pseudoClean, $passClean);
        //affiche la page de connexion
    } elseif ($actionClean === 'connexion') {
        $userController->connexion();
        //affiche un article par son id
    } elseif ($actionClean === 'article') {
        $postController->get($idClean);
        //ajoute un commentaire avec l'id de l'article et en récupérant les info du post(author, contenu)
    } elseif ($actionClean === 'addComment') {
        $commentController->add($postIdClean, $authorCommentClean, $contentCommentClean);
        //Affiche la page home
    } elseif ($actionClean === 'home') {
        $viewController->Display($actionClean);
        //Afiche la page biographie
    } elseif ($actionClean === 'biographie') {
        $viewController->Display($actionClean);
        //Report un commentaire
    } elseif ($actionClean === 'reportComment') {
        $commentController->report($idClean, $postIdClean);
    } elseif ($actionClean === null) {
        $viewController->Display();
    } else {
        throw new Exception("404 Page introuvable");
    }
} catch (Exception $e) {
    $_SESSION["error"] = $e->getMessage();
    $viewController->Display('error');
}

