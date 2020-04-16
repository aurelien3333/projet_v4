<?php
require_once ('Manager.php');

class PostManager extends Manager
{

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, creation_date FROM posts ORDER BY creation_date');

        return $req;
    }

    public function getPost($id)
    {

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

    }





}