<?php

require_once('./model/PostManager.php');

function readPost()
{
    require ('./view/readPost.php');
}

function addPost($title, $content, $author){

    $postManager = new PostManager();
    $postManager->createPost($title, $content, $author);
    header('Location: ./index.php?action=admin');
}

function ConnectAdmin()
{
    $postManager = new PostManager();
    $posts= $postManager->getList();
    require ('./view/admin.php');
}

function removePost($id)
{
    $postManager = new PostManager();
    $posts = $postManager->deletePost($id);
    header('Location: ./index.php?action=admin');
}
