<?php

require_once('./model/PostManager.php');
require_once('./model/Post.php');
require_once('./model/Comment.php');
require_once('./model/CommentManager.php');

class PostController
{

    function readPost()
    {
        require('./view/readPost.php');
    }

    function addPost($title, $content, $author)
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


    function removePost($id)
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

    function modifiedPost($id)
    {
        $postManager = new PostManager();
        $post = $postManager->get($id);
        require('./view/modifiedPost.php');

    }

    function updatePost($title, $content, $author, $id)
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

    function listPosts()
    {
        $postManager = new PostManager();
        /** @var $posts Post[] */
        $posts = $postManager->getList();

        require('./view/home.php');
    }

    function getPost($id)
    {
        $postManager = new PostManager();
        $posts = $postManager->get($id);

        $commentManager = new CommentManager();
        $comments = $commentManager->getListByPostId($id);
        require('./view/singlePost.php');

    }
}