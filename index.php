<?php
require_once ('controller/AdminController.php');
require_once ('controller/CommentController.php');
require_once ('controller/PostController.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'listPosts') {
        $post = new PostController();
        $post->listPosts();
    } elseif ($_GET['action'] === 'readPost') {
        $post = new PostController();
        $post->readPost();
    } elseif ($_GET['action'] === 'addPost') {                                                 //verrifier le post s'il y a author content et title
        $post = new PostController();
        $post->addPost($_POST['title_post'], $_POST['content_post'], $_POST['author_post']);
    } elseif ($_GET['action'] === 'admin') {
        $admin = new AdminController();
        $admin->display();
    } elseif ($_GET['action'] === 'removePost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            $post = new PostController();
            $post->removePost($_GET['id']);
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
            $post = new PostController();
            $post->getPost($_GET['id']);
        }
    } elseif ($_GET['action'] === 'modifiedPost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            $post = new PostController();
            $post->modifiedPost($_GET['id']);
        }
    } elseif ($_GET['action'] === 'updatePost') {
        $post = new PostController();
        $post->updatePost($_POST['title_post'], $_POST['content_post'], $_POST['author_post'], $_GET['id']);
    } elseif ($_GET['action'] === 'addComment') {
        $comment = new CommentController();
        $comment->addComment($_GET['postId'], $_POST['author_comment'], $_POST['content_comment']);
    }

} else {
    $post = new PostController();
    $post->listPosts();
}