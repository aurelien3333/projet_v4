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

if (!empty($_GET['action'])) {

    //nettoyage $_GET
    if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
        $idClean = (int)filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    } elseif (isset($_GET['postId']) && (int)$_GET['postId'] > 0) {
        $postIdClean = (int)filter_var($_GET['postId'], FILTER_SANITIZE_NUMBER_INT);
    }
    //nettoyage $_POST
    if (isset($_POST['title_post'], $_POST['content_post'], $_POST['author_post'])) {
        $titlePostClean = (string)filter_var($_POST['title_post'], FILTER_SANITIZE_STRING);
        $contentPostClean = (string)filter_var($_POST['content_post'], FILTER_SANITIZE_STRING);
        $authorPostClean = (string)filter_var($_POST['author_post'], FILTER_SANITIZE_STRING);
    } elseif (isset($_POST['author_comment'], $_POST['content_comment'])) {
        $authorCommentClean = (string)filter_var($_POST['author_comment'], FILTER_SANITIZE_STRING);
        $contentCommentClean = (string)filter_var($_POST['content_comment'], FILTER_SANITIZE_STRING);
    }
//    elseif (isset($_POST['user_pseudo'], $_POST['user_psw'])) {
//        $userPseudoClean = (string)filter_var($_POST['user_pseudo'], FILTER_SANITIZE_STRING);
//        $userPwdClean = (string)filter_var($_POST['user_psw'], FILTER_SANITIZE_STRING);
//    }

    $commentController = new CommentController();
    $userController = new UserController();

    //Si l'utilisateur est connecté
    if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])) {
        //affiche la vue avec l'editeur de text pour ecrire un nouvel article
        $adminController = new AdminController();
        if ($_GET['action'] === 'readPost') {
            $postController->readPost();
            //Supprime un commentaire par son id
        } elseif ($_GET['action'] === 'removeComment') {
            $commentController->removeComment($idClean);
            //Supprime un post par son id
        } elseif ($_GET['action'] === 'removePost') {
            $postController->removePost($idClean);
            //Ajoute un article avec le contenue du post (titre, autheur, contenu)
        } elseif ($_GET['action'] === 'addPost') {
            $postController->addPost($titlePostClean, $contentPostClean, $authorPostClean);
            //Récupére un article par son id est l'affiche dans l'éditeur de texte pour le modifier
        } elseif ($_GET['action'] === 'modifiedPost') {
            $postController->modifiedPost($idClean);
            //met a jour l'article aprés les modifications
        } elseif ($_GET['action'] === 'updatePost') {
            $postController->updatePost($titlePostClean, $contentPostClean, $authorPostClean, $idClean);
            //affiche l'administration
        } elseif ($_GET['action'] === 'admin') {
            $admin = new AdminController();
            $admin->display();
            //Déconnecte l'utilisateur
        } elseif ($_GET['action'] === 'removeConnexion') {
            $userController->deleteConnexion();
        }
    }
    //affiche la liste de tous les articles
    if ($_GET['action'] === 'listPosts') {
        $postController->listPosts();
        // Récupére les identifiant entré par l'utilisateur et verifie si ils sont valables
    } elseif ($_GET['action'] === 'newConnexion') {
        if (!empty($_POST['user_pseudo']) && !empty($_POST['user_pwd'])) {
            $userController = new UserController();
            $userController->check($_POST['user_pseudo'], $_POST['user_pwd']);
        }
        //affiche la page de connexion
    } elseif ($_GET['action'] === 'connexion') {
        $userController->connexion();
        //affiche un article par son id
    } elseif ($_GET['action'] === 'singlePost') {
        $postController->getPost($idClean);
        //ajoute un commentaire avec l'id de l'article et en récupérant les info du post(author, contenu)
    } elseif ($_GET['action'] === 'addComment') {
        $commentController->addComment($postIdClean, $authorCommentClean, $contentCommentClean);
        //Affiche la page home
    } elseif ($_GET['action'] === 'home') {
        require('./View/home.php');
        //Afiche la page biographie
    } elseif ($_GET['action'] === 'biographie') {
        require('./View/biographie.php');
    }
    //affiche la list des article action par defaut
} else {
    require('./View/home.php');
}