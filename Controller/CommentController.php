<?php

class CommentController{

    public function add($postId, $author, $comment, $slug){
        $comment = new Comment([
            'post_id' => $postId,
            'comment' => $comment,
            'author' => $author
        ]);
        $commentManager = new CommentManager();
        $commentManager->add($comment);

        header('Location: /article/' . $postId . '/' . $slug . '#comment');
    }
    public function remove($id)
    {
        $commentManger = new CommentManager();
        $comment = $commentManger->get($id);
        $commentManger->delete($comment);

        header('Location: /admin');
    }
    public function report($id, $postId, $slug)
    {
        $commentManger = new CommentManager();
        $comment = $commentManger->report($id);

        header('Location: /article/' . $postId . '/' . $slug . '#' . $id);
    }
}