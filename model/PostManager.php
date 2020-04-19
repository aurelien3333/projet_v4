<?php
require_once ('Manager.php');
require_once ('Post.php');



class PostManager extends Manager
{
    private $db;

    public function __construct()
    {
        $this->db = new Manager();
    }

    public function getList()   //new ok
    {
        $posts = [];

        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($donnees);
        }
        return $posts;
    }

    public function get($id)        //new ok
    {
        $id = (int) $id;
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') AS creation_date_fr FROM posts WHERE id ='.$id);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Post($donnees);


    }

    public function createPost($title, $content, $author)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(author, title, content, creation_date) VALUES(?, ?, ?, NOW())');
        $req->execute(array($author, $title, $content));
    }

    public function updatePost($id)
    {

    }

    public function deletePost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
}