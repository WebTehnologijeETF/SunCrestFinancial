<?php

class CommentItem
{
  // date
  private $id = "";
  
  public function getId()
  {
      return $this->id;
  }
  
  public function setId($newval)
  {
      $this->id = $newval;
  }
  
  // date
  private $dateCreated = "";
  
  public function getDateCreated()
  {
      return $this->dateCreated;
  }
  
  public function setDateCreated($newval)
  {
      $this->dateCreated = $newval;
  }
  
  // author
  private $author = "";
  
  public function getAuthor()
  {
      return $this->author;
  }
  
  public function setAuthor($newval)
  {
      $this->author = $newval;
  }
  
  
  // email
  private $email = "";
  
  public function getEmail()
  {
      return $this->email;
  }
  
  public function setEmail($newval)
  {
      $this->email = $newval;
  }
  
  // content
  private $content = "";
  
  public function getContent()
  {
      return $this->content;
  }
  
  public function setContent($newval)
  {
      $this->content = $newval;
  }

}