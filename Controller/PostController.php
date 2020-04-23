<?php

require_once('./Model/PostManager.php');
require_once('./Model/Post.php');
require_once('./Model/Comment.php');
require_once('./Model/CommentManager.php');

class PostController
{

    static function readPost()
    {
        require('./View/readPost.php');
    }

    static function addPost($title, $content, $author)
    {

        $post = new Post([
            'title' => $title,
            'content' => $content,
            'author' => $author
        ]);

        $postManager = new PostManager();
        $postManager->add($post);

        header('Location: ./index.php?action=admin');
    }


    static function removePost($id)
    {
        $postManager = new PostManager();
        $post = $postManager->get($id);
        $postManager->delete($post);
        $commentManger = new CommentManager();
        $comments = $commentManger->getListByPostId($id);

        for ($i = 0; $i < count($comments); $i++) {
            $commentManger->delete($comments[$i]);
        }

        header('Location: ./index.php?action=admin');
    }

    static function modifiedPost($id)
    {
        $postManager = new PostManager();
        $post = $postManager->get($id);
        require('./View/modifiedPost.php');

    }

    static function updatePost($title, $content, $author, $id)
    {
        $post = new Post([
            'title' => $title,
            'content' => $content,
            'author' => $author,
            'id' => $id
        ]);
        $postManager = new PostManager();
        $postManager->update($post);

        header('Location: ./index.php?action=admin');
    }

    static function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getList();

        require('./View/home.php');
    }

    static function getPost($id)
    {
        $postManager = new PostManager();
        $posts = $postManager->get($id);

        $commentManager = new CommentManager();
        $comments = $commentManager->getListByPostId($id);
        require('./View/singlePost.php');

    }
}