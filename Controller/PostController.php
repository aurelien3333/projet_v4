<?php
//use Model\Post;

class PostController
{
    private $postManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
    }

    public function readPost()
    {
        require('./View/readPost.php');
    }

    public function addPost($title, $content, $author)
    {
        $post = new Post([
            'title' => $title,
            'content' => $content,
            'author' => $author
        ]);

        $postManager = new PostManager();
        $postManager->add($post);

        header('Location: /admin');
    }


    public function removePost($id)
    {
        $postManager = new PostManager();
        $post = $postManager->get($id);
        $postManager->delete($post);
        $commentManger = new CommentManager();
        $comments = $commentManger->getListByPostId($id);

        for ($i = 0; $i < count($comments); $i++) {
            $commentManger->delete($comments[$i]);
        }

        header('Location: /admin');
    }

    public function modifiedPost($id)
    {
        $postManager = new PostManager();
        $post = $postManager->get($id);
        require('./View/modifiedPost.php');

    }

    public function updatePost($title, $content, $author, $id)
    {
        $post = new Post([
            'title' => $title,
            'content' => $content,
            'author' => $author,
            'id' => $id
        ]);
        $postManager = new PostManager();
        $postManager->update($post);

        header('Location: /admin');
    }

    public function listPosts()
    {
        $postManager = new PostManager();
        $posts = $postManager->getList();

        require('./View/listPost.php');
    }

    public function getPost($id)
    {
        $postManager = new PostManager();
        $post = $postManager->get($id);

        $commentManager = new CommentManager();
        $comments = $commentManager->getListByPostId($id);

        require('./View/singlePost.php');
    }
}