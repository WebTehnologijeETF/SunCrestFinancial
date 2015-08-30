<?php

require_once("commentItemClass.php");
 
class NewsItem
{
	
  function __construct() 
  {
	$this->comments = array();
  }
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
  
  // image
  private $image = "";
  
  public function getImage()
  {
      return $this->image;
  }
  
  public function setImage($newval)
  {
      $this->image = $newval;
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
  
  
  // title
  private $title = "";
  
  public function getTitle()
  {
      return $this->title;
  }
  
  public function setTitle($newval)
  {
      $this->title = $newval;
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
  
  // detailedContent
  private $detailedContent = "";
  
  public function getDetailedContent()
  {
      return $this->detailedContent;
  }
  
  public function setDetailedContent($newval)
  {
      $this->detailedContent = $newval;
  }
  
  // detailedContent
  private $hasDetails = "";
  
  public function getHasDetails()
  {
      return $this->hasDetails;
  }
  
  public function setHasDetails($newval)
  {
      $this->hasDetails = $newval;
  }
  
  // comment
  private $comments;
  
  public function getComments()
  {
      return $this->comments;
  }
  
  public function setComments($newval)
  {
      $this->comments = $newval;
  }
}