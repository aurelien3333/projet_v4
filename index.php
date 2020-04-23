<?php
require_once('controller/frontend.php');
require_once('controller/backend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'listPosts') {
        listPosts();
    } elseif ($_GET['action'] === 'readPost') {
        readPost();
    } elseif ($_GET['action'] === 'addPost') {                                                 //verrifier le post s'il y a author content et title
        addPost($_POST['title_post'], $_POST['content_post'], $_POST['author_post']);
    } elseif ($_GET['action'] === 'admin') {
        ConnectAdmin();
    } elseif ($_GET['action'] === 'removePost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            removePost($_GET['id']);
        }
    } elseif ($_GET['action'] === 'removeComment') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            removeComment($_GET['id']);
        }
        ConnectAdmin();
    } elseif ($_GET['action'] === 'singlePost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            getPost($_GET['id']);
        }
    } elseif ($_GET['action'] === 'modifiedPost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            ModifiedPost($_GET['id']);
        }
    } elseif ($_GET['action'] === 'updatePost') {
        updatePost($_POST['title_post'], $_POST['content_post'], $_POST['author_post'], $_GET['id']);
    } elseif ($_GET['action'] === 'addComment') {
        addComment($_GET['postId'], $_POST['author_comment'], $_POST['content_comment']);
//        getPost($_GET['id']);
    }

} else {
    listPosts();
}