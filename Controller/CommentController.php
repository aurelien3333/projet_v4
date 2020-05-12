<?php

class CommentController{

    public function add(int $postId, string $author, string $comment, string $slug){
        $comment = new Comment([
            'post_id' => $postId,
            'comment' => $comment,
            'author' => $author
        ]);
        $commentManager = new CommentManager();
        $commentManager->add($comment);

        header('Location: /article/' . $slug . '/' . $postId . '#comment');
    }
    public function remove($id)
    {
        $commentManger = new CommentManager();
        $comment = $commentManger->get($id);
        $commentManger->delete($comment);

        header('Location: /admin');
    }
    public function report(int $id, string $postId, string $slug)
    {
        $commentManger = new CommentManager();
        $comment = $commentManger->report($id);

        header('Location: /article/' . $slug . '/' . $postId . '#' . $id);
    }
}