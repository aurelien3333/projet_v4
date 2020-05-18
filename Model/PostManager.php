<?php

class PostManager extends Manager
{   //Retourne la liste des articles
    public function getList()
    {
        $posts = [];

        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, slug, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($donnees);
        }
        return $posts;
    }
    //Récupére un article par son id
    public function getById(int $id)
    {
        $id = (int)$id;
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, author, slug, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') AS creation_date_fr FROM posts WHERE id =' . $id);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);

        if ($donnees !== false) {
            return new Post($donnees);
        } else {
            throw new Exception('Id article incorrect');
        }
    }
    //Ajout un article a la bdd
    public function add(Post $post)
    {
        $slug = $this->createSlug($post);

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(author, title, content, slug, creation_date) VALUES(:author, :title, :content, :slug, :creation_date)');

        $req->bindValue(':author', $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(':slug', $slug, PDO::PARAM_STR);
        $req->bindValue(':creation_date', date('Y-m-d H:i:s'), PDO::PARAM_STR);

        $req->execute();
    }
    //Met a jour un article
    public function update(Post $post)
    {
        $slug = $this->createSlug($post);
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET author = :author, title = :title, content = :content, slug = :slug, creation_date = :creation_date WHERE id = :id');

        $req->bindValue(':author', $post->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(':creation_date', date('Y-m-d H:i:s'), PDO::PARAM_STR);
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);
        $req->bindValue(':slug', $slug, PDO::PARAM_STR);

        $req->execute();
    }
    //Supprime un article
    public function delete(Post $post)
    {
        $db = $this->dbConnect();
        $db->exec('DELETE FROM posts WHERE id = ' . $post->getId());
    }
    //Méthode qui crée le slug en remplacant les espace par un tiret et les caractéres speciaux
    private function createSlug(Post $post)
    {
        $bad = array(
            'à', 'á', 'â', 'ã', 'ä', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í',
            'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü',
            'ý', 'ÿ', ':', ';', '.', '\,', '\'', '\"', '/', '!', '?', '^', '$'
        );
        $good = array(
            'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i',
            'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
            'y', 'y', '', '', '', '', '', '', '', '', '', '', ''
        );

        $title = $post->getTitle();
        $title = mb_strtolower($title, "UTF-8");
        $title = str_replace(' ', '-', $title);
        $title = str_replace($bad, $good, $title);

        return $title;
    }
}