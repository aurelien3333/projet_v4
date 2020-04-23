<?php

require_once('./Model/PostManager.php');
require_once('./Model/Post.php');
require_once('./Model/Comment.php');
require_once('./Model/CommentManager.php');

class AdminController{

    function display()
    {
        $postManager = new PostManager();
        $posts = $postManager->getList();
        $commentManager = new CommentManager();
        $comments = $commentManager->getList();

        require ('./View/admin.php');
    }

}