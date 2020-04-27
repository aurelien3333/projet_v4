<?php

require_once('./Model/Comment.php');
require_once('./Model/CommentManager.php');

class CommentController{

    static function addComment($postId, $author, $comment){
        $comment = new Comment([
            'post_id' => $postId,
            'comment' => $comment,
            'author' => $author
        ]);
        $commentManager = new CommentManager();
        $commentManager->add($comment);
        header('Location: /singlePost/' .$postId);
    }
    static function removeComment($id)
    {
        $commentManger = new CommentManager();
        $comment = $commentManger->get($id);
        $commentManger->delete($comment);

        header('Location: /admin');
    }
}