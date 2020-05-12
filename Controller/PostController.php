<?php
//use Model\Post;

class PostController
{
    private $postManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
    }

    public function read()
    {
        require('./View/readPost.php');
    }

    public function add(string $title, string $content, string $author)
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

    public function remove(int $id)
    {
        $postManager = new PostManager();
        $post = $postManager->getById($id);
        $postManager->delete($post);
        $commentManger = new CommentManager();
        $comments = $commentManger->getListByPostId($id);

        for ($i = 0; $i < count($comments); $i++) {
            $commentManger->delete($comments[$i]);
        }

        header('Location: /admin');
    }

    public function modified(?int $id)
    {
        $postManager = new PostManager();
        $post = $postManager->getById($id);
        require('./View/modifiedPost.php');
    }

    public function update(string $title, string $content, string $author, ?int $id)
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

    public function list()
    {
        $postManager = new PostManager();
        $posts = $postManager->getList();

        require('./View/listPost.php');
    }

    public function get(?int $id)
    {
        $postManager = new PostManager();
        $post = $postManager->getById($id);

        $commentManager = new CommentManager();
        $comments = $commentManager->getListByPostId($id);

        require('./View/singlePost.php');
    }
}