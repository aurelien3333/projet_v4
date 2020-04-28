<?php



class CommentManager extends Manager
{

    public function getListByPostId($postId)
    {
        $comments = [];

        $db = $this->dbConnect();
        $req = $db->query('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H h %i min\') AS comment_date_fr FROM comments WHERE post_id = ' . $postId );

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($donnees);
        }
        return $comments;
    }


    public function getList()
    {
        $comments = [];

        $db = $this->dbConnect();
        $req = $db->query('SELECT c.id AS id, post_id, c.author AS author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%i\') AS comment_date_fr, p.title as title_post FROM comments AS c LEFT JOIN posts AS p ON c.post_id = p.id ORDER BY comment_date DESC');

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($donnees);
        }
        return $comments;
    }

    public function get($id)
    {
        $id = (int)$id;
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%i\') AS comment_date_fr FROM comments WHERE id =' . $id);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Comment($donnees);


    }

    public function add(Comment $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(author, post_id, comment, comment_date) VALUES(:author, :post_id, :comment, :comment_date)');
        $req->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);
        $req->bindValue(':post_id', $comment->getPostId(), PDO::PARAM_INT);
        $req->bindValue(':comment', $comment->getComment(), PDO::PARAM_STR);
        $req->bindValue(':comment_date', date('Y-m-d H:i:s'), PDO::PARAM_STR);

        $req->execute();
    }


    public function delete(Comment $comment)
    {
        $db = $this->dbConnect();
        $db->exec('DELETE FROM comments WHERE id = ' . $comment->getId());

    }
}