<?php

class Comment
{
    private $_id;
    private $_post_id;
    private $_comment;
    private $_author;
    private $_comment_date_fr;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        if (isset($donnees['id'])) {
            $this->setId($donnees['id']);
        }
        if (isset($donnees['post_id'])) {
            $this->setPostId($donnees['post_id']);
        }
        if (isset($donnees['comment'])) {
            $this->setComment($donnees['comment']);
        }
        if (isset($donnees['author'])) {
            $this->setAuthor($donnees['author']);
        }
        if (isset($donnees['comment_date_fr'])) {
            $this->setCommentDateFr($donnees['comment_date_fr']);
        }
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getPostId()
    {
        return $this->_post_id;
    }

    public function setPostId($post_id)
    {
        $this->_post_id = $post_id;
    }

    public function getComment()
    {
        return $this->_comment;
    }

    public function setComment($comment)
    {
        $this->_comment = $comment;
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    public function getCommentDateFr()
    {
        return $this->_comment_date_fr;
    }

    public function setCommentDateFr($comment_date_fr)
    {
        $this->_comment_date_fr = $comment_date_fr;
    }




}