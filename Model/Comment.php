<?php

class Comment
{
    private $_id;
    private $_post_id;
    private $_comment;
    private $_author;
    private $_comment_date_fr;
    private $_title_post;
    private $_report;
    private $_slug_post;

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
        if (isset($donnees['report'])) {
            $this->setReport($donnees['report']);
        }
        if (isset($donnees['title_post'])) {
            $this->setTitlePost($donnees['title_post']);
        }
        if (isset($donnees['slug_post'])) {
            $this->setSlugPost($donnees['slug_post']);
        }
    }

    public function getSlugPost()
    {
        return $this->_slug_post;
    }

    public function setSlugPost($slug_post): void
    {
        $this->_slug_post = $slug_post;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getReport()
    {
        return $this->_report;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getPostId()
    {
        return $this->_post_id;
    }

    public function setReport($report)
    {
        $this->_report = $report;
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

    public function getTitlePost()
    {
        return $this->_title_post;
    }

    public function setTitlePost($title_post)
    {
        $this->_title_post = $title_post;
    }
}