<?php

//use Model\Post;

class PostManager extends Manager
{

    public function getList()
    {
        $posts = [];

        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($donnees);
        }
        return $posts;
    }

    public function get($id)
    {
        $id = (int)$id;
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') AS creation_date_fr FROM posts WHERE id =' . $id);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);

        return new Post($donnees);
    }

    public function add(Post $post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(author, title, content, creation_date) VALUES(:author, :title, :content, :creation_date)');

        $req->bindValue(':author', $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(':creation_date', date('Y-m-d H:i:s'), PDO::PARAM_STR);

        $req->execute();
    }

    public function update(Post $post)
    {

        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET author = :author, title = :title, content = :content, creation_date = :creation_date WHERE id = :id');

        $req->bindValue(':author', $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(':creation_date', date('Y-m-d H:i:s'), PDO::PARAM_STR);
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);

        $req->execute();
    }

    public function delete(Post $post)
    {
        $db = $this->dbConnect();
        $db->exec('DELETE FROM posts WHERE id = ' . $post->getId());

    }
}