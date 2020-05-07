<?php

class CommentController{

    public function add($postId, $author, $comment){
        $comment = new Comment([
            'post_id' => $postId,
            'comment' => $comment,
            'author' => $author
        ]);
        $commentManager = new CommentManager();
        $commentManager->add($comment);
        header('Location: /articles');
    }
    public function remove($id)
    {
        $commentManger = new CommentManager();
        $comment = $commentManger->get($id);
        $commentManger->delete($comment);

        header('Location: /admin');
    }
    public function report($id, $postId)
    {
        $commentManger = new CommentManager();
        $comment = $commentManger->report($id);

        header('Location: /articles');
    }
}