<?php

require_once('dataAccess.php');

function getNewsFromFiles() {
$news = array();

$directory = "../news/";
$dir = opendir($directory);
$id = 0;
while (($file = readdir($dir)) !== false) {
  $filename = $directory . $file;
  $type = filetype($filename);
  if ($type == 'file') {
     $contents = file($filename);
	 $index = 0;
	 $current = new NewsItem();
     foreach ($contents as $line_num => $line) {
	   $current->setId($id);
	   
	   if ($index == 0) {
			$current->setDateCreated($line);
	   }
	   if ($index == 1) {
			$current->setAuthor($line);
	   }
	   if ($index == 2) {
			$current->setTitle($line);
	   }
	   
	   if (trim($line) == "--") {
			$current->setHasDetails(true);
			$current->setDetailedContent($current->getContent());
		}
		
	   if ($index > 3 && trim($line) != "--") {
			if (!$current->getHasDetails())	
				$current->setContent($current->getContent()."".$line);
			if ($current->getHasDetails())
				$current->setDetailedContent($current->getDetailedContent()."".$line);
		}
	   $index++;
     }
		   
	array_push($news, $current);
	$id++;

  }
}
closedir($dir);

return $news;
}

function getNewsFromDatabase() {
	return fetchNewsWithComments();
}

function generateNewsHtml($news) {
	
	$result = "";
	
	foreach($news as $newsItem) {
	$result.= "<div class=\"news\">";
	$result.= "<div class=\"title\">";
	$result.= $newsItem->getTitle();
	$result.= "</div>";
	$result.= "<div class=\"author\">";
	$result.= $newsItem->getAuthor();
	$result.= "</div>";
	$result.= "<div class=\"date\">";
	$result.= $newsItem->getDateCreated();
	$result.= "</div>";
	$result.= "<div class=\"content\">";
	$result.= $newsItem->getContent();
	
	
	$result.= "<a href=\"#\" onclick=\"openNews(".$newsItem->getId().")\"> Detaljnije </a>";
	$result.= "</br></br>";
	$result.= "<a href=\"#\" onclick=\"openNews(".$newsItem->getId().")\"> Komentari(".count($newsItem->getComments()).") </a>";
	$result.= "</div>";
	$result.= "</div>";
	
	}
	
	return $result;
}

function generateNewsItemHtml($id) {
	
	$result = "";
	$item = fetchNewsItemWithComments($id);
	


	$result.= "<div class=\"news\">";
	$result.= "<div class=\"title\">";
	$result.= $item->getTitle();
	$result.= "</div>";
	$result.= "<div class=\"author\">";
	$result.= $item->getAuthor();
	$result.= "</div>";
	$result.= "<div class=\"date\">";
	$result.= $item->getDateCreated();
	$result.= "</div>";
	$result.= "<div class=\"content\">";
	$result.= $item->getDetailedContent();
	$result.= "</div>";
	$result.= "</div>";
	
	foreach($item->getComments() as $comment) {
		$result.= "<div class=\"comment\">";
		$result.= "<span class=\"text\">";
		$result.= $comment->getContent();
		$result.= "</span>";
		$result.= "<span class=\"info\">";
		$result.= "Autor: <a href=\"mailto:".$comment->getEmail()."\">";
		$result.= $comment->getAuthor();
		$result.= "</a> | ";
		$result.= $comment->getDateCreated();
		$result.= "</span>";
		$result.= "</div>";
	}

	return $result;

}


