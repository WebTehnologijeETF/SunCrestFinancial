<?php
 
class NewsItem
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
  private $hasDetails = false;
  
  public function getHasDetails()
  {
      return $this->hasDetails;
  }
  
  public function setHasDetails($newval)
  {
      $this->hasDetails = $newval;
  }
}