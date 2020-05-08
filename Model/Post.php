<?php

//namespace Model;

class Post
{
    private $_id;
    private $_title;
    private $_content;
    private $_author;
    private $_creation_date_fr;
    private $_slug;

    public function __construct(array $donnees)
    {
      $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        if (isset($donnees['id'])) {
            $this->setId($donnees['id']);
        }
        if (isset($donnees['title'])) {
            $this->setTitle($donnees['title']);
        }
        if (isset($donnees['content'])) {
            $this->setContent($donnees['content']);
        }
        if (isset($donnees['author'])) {
            $this->setAuthor($donnees['author']);
        }
        if (isset($donnees['slug'])) {
            $this->setSlug($donnees['slug']);
        }
        if (isset($donnees['creation_date_fr'])) {
            $this->setCreationDateFr($donnees['creation_date_fr']);
        }

    }


    public function getSlug()
    {
        return $this->_slug;
    }

    public function setSlug($slug): void
    {
        $this->_slug = $slug;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function setContent($content)
    {
        $this->_content = $content;
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    public function getCreationDateFr()
    {
        return $this->_creation_date_fr;
    }

    public function setCreationDateFr($creation_date_fr)
    {
        $this->_creation_date_fr = $creation_date_fr;
    }


}