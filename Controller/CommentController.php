<?php

require_once('./Model/Comment.php');
require_once('./Model/CommentManager.php');

class CommentController{

    function addComment($postId, $author, $comment){
        $comment = new Comment([
            'post_id' => $postId,
            'comment' => $comment,
            'author' => $author
        ]);
        $commentManager = new CommentManager();
        $commentManager->add($comment);

        header('Location: ./index.php?action=singlePost&id=' .$postId);
    }
    function removeComment($id)
    {

        $commentManger = new CommentManager();
        $comment = $commentManger->get($id);
        $commentManger->delete($comment);

        header('Location: ./index.php?action=admin');
    }
}