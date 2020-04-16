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

    public function createPost($author, $content)
    {

    }

    public function updatePost($id)
    {

    }

    public function deletePost($id)
    {

    }





}