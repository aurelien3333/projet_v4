<?php
var_dump($_GET);
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

if (!empty($_GET['action'])) {

    //nettoyage $_GET
    $idClean = isset($_GET['id']) && (int)$_GET['id'] > 0 ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : null;
    $postIdClean = isset($_GET['postId']) && (int)$_GET['postId'] > 0 ? filter_var($_GET['postId'], FILTER_SANITIZE_NUMBER_INT) : null;
    $actionClean = isset($_GET['action']) && (string)$_GET['action'] ? filter_var($_GET['action'], FILTER_SANITIZE_STRING) : null;
    //nettoyage $_POST
    if (isset($_POST['title_post'], $_POST['content_post'], $_POST['author_post'])) {
        $postTitleClean = filter_var($_POST['title_post'], FILTER_SANITIZE_STRING);
        $postContentClean = filter_var($_POST['content_post'], FILTER_SANITIZE_STRING);
        $postAuthorClean = filter_var($_POST['author_post'], FILTER_SANITIZE_STRING);
    } elseif (isset($_POST['author_comment'], $_POST['content_comment'])) {
        $authorCommentClean = filter_var($_POST['author_comment'], FILTER_SANITIZE_STRING);
        $contentCommentClean = filter_var($_POST['content_comment'], FILTER_SANITIZE_STRING);
    }
//    elseif (isset($_POST['user_pseudo'], $_POST['user_psw'])) {
//        $userPseudoClean = (string)filter_var($_POST['user_pseudo'], FILTER_SANITIZE_STRING);
//        $userPwdClean = (string)filter_var($_POST['user_psw'], FILTER_SANITIZE_STRING);
//    }

    //Si l'utilisateur est connecté
    if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])) {
        //affiche la vue avec l'editeur de text pour ecrire un nouvel article
        $adminController = new AdminController();
        if ($actionClean === 'readPost') {
            $postController->read();
            //Supprime un commentaire par son id
        } elseif ($actionClean === 'removeComment') {
            $commentController->remove($idClean);
            //Supprime un post par son id
        } elseif ($actionClean === 'removePost') {
            $postController->remove($idClean);
            //Ajoute un article avec le contenue du post (titre, autheur, contenu)
        } elseif ($actionClean === 'addPost') {
            $postController->add($postTitleClean, $postContentClean, $postAuthorClean);
            //Récupére un article par son id est l'affiche dans l'éditeur de texte pour le modifier
        } elseif ($actionClean === 'modifiedPost') {
            $postController->modified($idClean);
            //met a jour l'article aprés les modifications
        } elseif ($actionClean === 'updatePost') {
            $postController->update($postTitleClean, $postContentClean, $postAuthorClean, $idClean);
            //affiche l'administration
        } elseif ($actionClean === 'admin') {
            $admin = new AdminController();
            $admin->display();
            //Déconnecte l'utilisateur
        } elseif ($actionClean === 'removeConnexion') {
            $userController->deleteConnexion();
        }
    }
        //affiche la liste de tous les articles
    if ($actionClean === 'articles') {
        $postController->list();
        // Récupére les identifiant entré par l'utilisateur et verifie si ils sont valables
    } elseif ($actionClean === 'newConnexion') {
        if (!empty($_POST['user_pseudo']) && !empty($_POST['user_pwd'])) {
            $userController->check($_POST['user_pseudo'], $_POST['user_pwd']);
        }
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
    } else {
        echo "erreur";
    }

} else {
    //affiche la page home action par defaut
    $viewController->Display('');
}

