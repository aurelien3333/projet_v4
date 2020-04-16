<?php

require('./model/PostManager.php');


function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('./view/home.php');
}

function readPost()
{
    require ('./view/readPost.php');
}

function addPost($title, $content, $author){

    $postManager = new PostManager();
    $postManager->createPost($title, $content, $author);
    header('Location: ./index.php');
}

function ConnectAdmin()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require ('./view/admin.php');
}

