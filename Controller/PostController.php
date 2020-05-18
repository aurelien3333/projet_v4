<?php

class PostController
{
    private $postManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
    }
    //Apel la vue readPost pour rediger un article
    public function read()
    {
        require('./View/readPost.php');
    }
    //Envoi les données de l'article rediger dans l'objet Post
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
    //Recupére un article par son id et apel la methode delete de post manager pour le supprimer et aussi supprimer c'est commentaire
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
    //Récupére un article et le renvoi dans la vue modifiedPost pour le modifier
    public function modified(?int $id)
    {
        $postManager = new PostManager();
        $post = $postManager->getById($id);
        require('./View/modifiedPost.php');
    }

    //Récupére l'article modifié et l'envoi dans Post
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
    //Apel PostgManager pour avoir la list des article et apel la vue listPost
    public function list()
    {
        $postManager = new PostManager();
        $posts = $postManager->getList();

        require('./View/listPost.php');
    }
    // Apel un article par son id et les commentaire de cette article
    public function get(?int $id)
    {
        $postManager = new PostManager();
        $post = $postManager->getById($id);

        $commentManager = new CommentManager();
        $comments = $commentManager->getListByPostId($id);

        require('./View/singlePost.php');
    }
}