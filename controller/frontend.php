<?php

require_once('./model/PostManager.php');
require_once('./model/Post.php');


function listPosts()
{
    $postManager = new PostManager();
    $posts= $postManager->getList();

    require('./view/home.php');
}

function getPost($id)
{
    $postManager = new PostManager();
    $posts= $postManager->get($id);
    require('./view/singlePost.php');

}