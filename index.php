<?php
session_start();

function LoadClass($classe)
{
    if (file_exists('./Controller/' . $classe . '.php')){
        require './Controller/' . $classe . '.php';
    } else {
        require './Model/' . $classe . '.php';
    }
}
spl_autoload_register('LoadClass');



if (!empty($_GET['action'])) {
    //nettoyage $_GET

    if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
        $idClean = (int)filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    }
    //Si l'utilisateur est connecté
    if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])) {
        //affiche la vue avec l'editeur de text pour ecrire un nouvel article
        if ($_GET['action'] === 'readPost') {
            $postController = new PostController();
            $postController->readPost();
            //Supprime un commentaire par son id
        } elseif ($_GET['action'] === 'removeComment') {
            if (!empty($idClean)) {
                CommentController::removeComment($idClean);
            }
            //Supprime un post par son id
        } elseif ($_GET['action'] === 'removePost') {
            if (!empty($idClean)) {
                PostController::removePost($idClean);
            }
            //Ajoute un article avec le contenue du post (titre, autheur, contenu)
        } elseif ($_GET['action'] === 'addPost') {
            if (!empty($_POST['title_post']) && !empty($_POST['content_post']) && !empty($_POST['author_post'])) {
                PostController::addPost($_POST['title_post'], $_POST['content_post'], $_POST['author_post']);
            }
            //Récupére un article par son id est l'affiche dans l'éditeur de texte pour le modifier
        } elseif ($_GET['action'] === 'modifiedPost') {
            if (!empty($idClean)) {
                PostController::modifiedPost($idClean);
            }
            //met a jour l'article aprés les modifications
        } elseif ($_GET['action'] === 'updatePost') {
            if (!empty($_POST['title_post']) && !empty($_POST['content_post']) && !empty($_POST['author_post'])) {
                PostController::updatePost($_POST['title_post'], $_POST['content_post'], $_POST['author_post'], $idClean);
            }
            //affiche l'administration
        } elseif ($_GET['action'] === 'admin') {
            $admin = new AdminController();
            $admin->display();
            //Déconnecte l'utilisateur
        } elseif ($_GET['action'] === 'removeConnexion') {
            UserController::deleteConnexion();
        }
    }
    //affiche la liste de tous les articles
    if ($_GET['action'] === 'listPosts') {
        PostController::listPosts();
        // Récupére les identifiant entré par l'utilisateur et verifie si ils sont valables
    } elseif ($_GET['action'] === 'newConnexion') {
        if (!empty($_POST['user_pseudo']) && !empty($_POST['user_pwd'])) {
            $userController = new UserController();
            $userController->check($_POST['user_pseudo'], $_POST['user_pwd']);
        }
        //affiche la page de connexion
    } elseif ($_GET['action'] === 'connexion') {
        UserController::connexion();
        //affiche un article par son id
    } elseif ($_GET['action'] === 'singlePost' && isset($idClean)) {

        PostController::getPost($idClean);

        //ajoute un commentaire avec l'id de l'article et en récupérant les info du post(author, contenu)
    } elseif ($_GET['action'] === 'addComment') {
        if (!empty($_GET['postId']) && !empty($_POST['author_comment']) && !empty($_POST['content_comment'])) {
            CommentController::addComment($_GET['postId'], $_POST['author_comment'], $_POST['content_comment']);
        }
    }
    //affiche la list des article action par defaut
} else {
    PostController::listPosts();
}