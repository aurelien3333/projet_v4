<?php
 class post {

     private $_title;
     private $_content;
     private $_author;
     private $_id;


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

     public function getId()
     {
         return $this->_id;
     }

     public function setId($id)
     {
         $this->_id = $id;
     }





 }