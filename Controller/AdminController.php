<?php


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