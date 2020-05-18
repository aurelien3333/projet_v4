<?php

class CommentManager extends Manager
{
    //Récupération des commentaires par l'id d'un post
    public function getListByPostId(int $postId)
    {
        $comments = [];

        $db = $this->dbConnect();
        $req = $db->query('SELECT id, post_id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H h %i min\') AS comment_date_fr FROM comments WHERE post_id = ' . $postId . ' ORDER BY comment_date_fr DESC');

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($donnees);
        }
        return $comments;
    }
    //Récupération de la list de commentaire
    public function getList()
    {
        $comments = [];

        $db = $this->dbConnect();
        $req = $db->query('SELECT c.id AS id, post_id, c.author AS author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%i\') AS comment_date_fr,
           p.title as title_post, p.slug as slug_post FROM comments AS c LEFT JOIN posts AS p ON c.post_id = p.id
           ORDER BY comment_date DESC');

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($donnees);
        }
        return $comments;
    }
    //Récuperation d'un seul comnetaire par son id
    public function get(int $id)
    {
        $id = (int)$id;
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, post_id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H h %i min\') AS comment_date_fr FROM comments WHERE id = ' . $id);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Comment($donnees);
    }
    //Méthode pour ajouter un commentaire
    public function add(Comment $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(author, post_id, comment, report, comment_date) VALUES(:author, :post_id, :comment, :report, :comment_date)');
        $req->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':post_id', $comment->getPostId(), PDO::PARAM_INT);
        $req->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $req->bindValue(':report', 'non', PDO::PARAM_STR);
        $req->bindValue(':comment_date', date('Y-m-d H:i:s'), PDO::PARAM_STR);

        $req->execute();
    }
    //Supression d'un commentaire
    public function delete(Comment $comment)
    {
        $db = $this->dbConnect();
        $db->exec('DELETE FROM comments WHERE id = ' . $comment->getId());
    }
    // Méthode pour reporter un commentaire
    public function report(int $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET report = :report WHERE id = :id');

        $req->bindValue(':report', 'oui', PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();
    }
}
