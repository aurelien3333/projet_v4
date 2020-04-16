<?php
require_once('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    } elseif ($_GET['action'] == 'readPost') {
        readPost();
    } elseif ($_GET['action'] == 'addPost') {  //verrifier le post si il y a author content et title
        addPost($_POST['title_post'], $_POST['content_post'], $_POST['author_post']);
    } elseif ($_GET['action'] == 'admin' ){
        ConnectAdmin();
    }

} else {
    listPosts();
}