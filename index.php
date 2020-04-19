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
        ConnectAdmin();
    } elseif ($_GET['action'] === 'singlePost') {
        if (!empty($_GET['id']) && (int)$_GET['id'] > 0) {
            getPost($_GET['id']);
        }

    }


} else {
    listPosts();
}