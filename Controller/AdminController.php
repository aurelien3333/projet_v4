<?php

class AdminController{
    //affiche la vue admin la liste des articles et des commentaires
    function display()
    {
        $postManager = new PostManager();
        $posts = $postManager->getList();
        $commentManager = new CommentManager();
        $comments = $commentManager->getList();

        require ('./View/admin.php');
    }
}