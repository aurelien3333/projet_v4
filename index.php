<?php
session_start();

require_once('Controller/AdminController.php');
require_once('Controller/CommentController.php');
require_once('Controller/PostController.php');
require_once('Controller/UserController.php');

if (isset($_GET['action'])) {
    if (isset($_SESSION['pass']) AND isset($_SESSION['pseudo'])) {

        if ($_GET['action'] === 'readPost') {
            PostController::readPost();
        } elseif ($_GET['action'] === 'removeComment') {
            if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
                CommentController::removeComment($_GET['id']);
            }
        } elseif ($_GET['action'] === 'removePost') {
            if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
                PostController::removePost($_GET['id']);
            } else {
                $admin = new AdminController();
                $admin->display();
            }
        } elseif ($_GET['action'] === 'modifiedPost') {
            if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
                PostController::modifiedPost($_GET['id']);
            }
        } elseif ($_GET['action'] === 'admin') {
            $admin = new AdminController();
            $admin->display();
        } elseif ($_GET['action'] === 'removeConnexion') {
            UserController::deleteConnexion();
        }
    } if ($_GET['action'] === 'listPosts') {
        PostController::listPosts();
    } elseif ($_GET['action'] === 'newConnexion') {
        if (!empty($_POST['user_pseudo']) && !empty($_POST['user_pwd'])) {
            $userController = new UserController();
            $userController->check($_POST['user_pseudo'], $_POST['user_pwd']);
        }
    } elseif ($_GET['action'] === 'connexion') {
        UserController::connexion();
    } elseif ($_GET['action'] === 'addPost') {
        if (!empty($_POST['title_post']) && !empty($_POST['content_post']) && !empty($_POST['author_post'])) {
            PostController::addPost($_POST['title_post'], $_POST['content_post'], $_POST['author_post']);
        }
    } elseif ($_GET['action'] === 'singlePost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            PostController::getPost($_GET['id']);
        }
    } elseif ($_GET['action'] === 'addComment') {
        if (!empty($_GET['postId']) && (int)$_GET['postId'] && !empty($_POST['author_comment']) && !empty($_POST['content_comment'])) {
            CommentController::addComment($_GET['postId'], $_POST['author_comment'], $_POST['content_comment']);
        }
    }
} else {
    PostController::listPosts();

}
var_dump($_SESSION);