<?php

require_once('./model/PostManager.php');
require_once('./model/Post.php');

function readPost()
{
    require ('./view/readPost.php');
}

function addPost($title, $content, $author){

    $post = new Post([
        'title' => $title,
        'content' => $content,
        'author' => $author
    ]);

    $postManager = new PostManager();
    $postManager->add($post);

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
    $post = $postManager->get($id);
    $postManager->delete($post);

    header('Location: ./index.php?action=admin');
}

function modifiedPost($id)
{
    $postManager = new PostManager();
    $post = $postManager->get($id);
    require ('./view/modifiedPost.php');

}
function updatePost($title, $content, $author, $id)
{

    $post = new Post([
        'title' => $title,
        'content' => $content,
        'author' => $author,
        'id' => $id
    ]);
    $postManager = new PostManager();
    $postManager->update($post);

    header('Location: ./index.php?action=admin');
}