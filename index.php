<?php
require_once('controller/AdminController.php');
require_once('controller/CommentController.php');
require_once('controller/PostController.php');

if (isset($_GET['action'])) {

    if ($_GET['action'] === 'listPosts') {
        PostController::listPosts();
    } elseif ($_GET['action'] === 'readPost') {
        PostController::readPost();
    } elseif ($_GET['action'] === 'addPost') {
        if (!empty($_POST['title_post']) && !empty($_POST['content_post']) && !empty($_POST['author_post'])) {
            PostController::addPost($_POST['title_post'], $_POST['content_post'], $_POST['author_post']);
        }
    } elseif ($_GET['action'] === 'admin') {
        $admin = new AdminController();
        $admin->display();
    } elseif ($_GET['action'] === 'removePost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            PostController::removePost($_GET['id']);
        }
    } elseif ($_GET['action'] === 'removeComment') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            $comment = new CommentController();
            $comment->removeComment($_GET['id']);
        }
        $admin = new AdminController();
        $admin->display();
    } elseif ($_GET['action'] === 'singlePost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            PostController::getPost($_GET['id']);
        }
    } elseif ($_GET['action'] === 'modifiedPost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            PostController::modifiedPost($_GET['id']);
        }
    } elseif ($_GET['action'] === 'updatePost') {
        if (!empty($_POST['title_post']) && !empty($_POST['content_post']) && !empty($_POST['content_post']) && !empty($_GET['id']) && (int)$_GET['id']) {
            PostController::updatePost($_POST['title_post'], $_POST['content_post'], $_POST['content_post'], $_GET['id']);
        }
    } elseif ($_GET['action'] === 'addComment') {
        if (!empty($_GET['postId']) && (int)$_GET['postId'] && !empty($_POST['author_comment']) && !empty($_POST['content_comment'])) {
            $comment = new CommentController();
            $comment->addComment($_GET['postId'], $_POST['author_comment'], $_POST['content_comment']);
        }
    }
} else {
    PostController::listPosts();
}