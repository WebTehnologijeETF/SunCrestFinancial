<?php

class CommentItem
{
  // date
  public $id = "";
  
  public function getId()
  {
      return $this->id;
  }
  
  public function setId($newval)
  {
      $this->id = $newval;
  }
  
  // date
  public $dateCreated = "";
  
  public function getDateCreated()
  {
      return $this->dateCreated;
  }
  
  public function setDateCreated($newval)
  {
      $this->dateCreated = $newval;
  }
  
  // author
  public $author = "";
  
  public function getAuthor()
  {
      return $this->author;
  }
  
  public function setAuthor($newval)
  {
      $this->author = $newval;
  }
  
  
  // email
  public $email = "";
  
  public function getEmail()
  {
      return $this->email;
  }
  
  public function setEmail($newval)
  {
      $this->email = $newval;
  }
  
  // content
  public $content = "";
  
  public function getContent()
  {
      return $this->content;
  }
  
  public function setContent($newval)
  {
      $this->content = $newval;
  }

}