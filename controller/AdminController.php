<?php

require_once('./model/PostManager.php');
require_once('./model/Post.php');
require_once('./model/Comment.php');
require_once('./model/CommentManager.php');

class AdminController{

    function display()
    {
        $postManager = new PostManager();
        $posts = $postManager->getList();
        $commentManager = new CommentManager();
        $comments = $commentManager->getList();

        require ('./view/admin.php');
    }

}