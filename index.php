<?php
session_start();

require_once('Controller/AdminController.php');
require_once('Controller/CommentController.php');
require_once('Controller/PostController.php');
require_once('Controller/UserController.php');

if (isset($_GET['action'])) {
    //nettoyage $_GET

    if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
        $idClean = (int)filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    }

    if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])) {

        if ($_GET['action'] === 'readPost') {
            PostController::readPost();
        } elseif ($_GET['action'] === 'removeComment') {
            if (!empty($idClean)) {
                CommentController::removeComment($idClean);
            }
        } elseif ($_GET['action'] === 'removePost') {
            if (!empty($idClean)) {
                PostController::removePost($idClean);
            } else {
                $admin = new AdminController();
                $admin->display();
            }
        } elseif ($_GET['action'] === 'addPost') {
            if (!empty($_POST['title_post']) && !empty($_POST['content_post']) && !empty($_POST['author_post'])) {
                PostController::addPost($_POST['title_post'], $_POST['content_post'], $_POST['author_post']);
            }
        } elseif ($_GET['action'] === 'modifiedPost') {
            if (!empty($idClean)) {
                PostController::modifiedPost($idClean);
            }
        } elseif ($_GET['action'] === 'updatePost') {
            if (!empty($_POST['title_post']) && !empty($_POST['content_post']) && !empty($_POST['author_post'])) {
                PostController::updatePost($_POST['title_post'], $_POST['content_post'], $_POST['author_post'], $idClean);
            }
        } elseif ($_GET['action'] === 'admin') {
            $admin = new AdminController();
            $admin->display();
        } elseif ($_GET['action'] === 'removeConnexion') {
            UserController::deleteConnexion();
        }
    }
    if ($_GET['action'] === 'listPosts') {
        PostController::listPosts();
    } elseif ($_GET['action'] === 'newConnexion') {
        if (!empty($_POST['user_pseudo']) && !empty($_POST['user_pwd'])) {
            $userController = new UserController();
            $userController->check($_POST['user_pseudo'], $_POST['user_pwd']);
        }
    } elseif ($_GET['action'] === 'connexion') {
        UserController::connexion();
    } elseif ($_GET['action'] === 'singlePost') {
        if (!empty($idClean)) {
            PostController::getPost($idClean);
        }
    } elseif ($_GET['action'] === 'addComment') {
        if (!empty($_GET['postId']) && !empty($_POST['author_comment']) && !empty($_POST['content_comment'])) {
            CommentController::addComment($_GET['postId'], $_POST['author_comment'], $_POST['content_comment']);
        }
    }
} else {
    PostController::listPosts();
}