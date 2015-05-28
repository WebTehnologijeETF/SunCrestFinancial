<?php

require_once('newsItemClass.php');

function getDbContext() {
	return new PDO('mysql:host=localhost;dbname=banka;charset=utf8', 'root', '');
}

function fetchNewsWithComments() {

	$query = getDbContext()->query("SELECT * FROM novost LEFT OUTER JOIN komentar ON novost.id = komentar.novost_id");

	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	$toReturn = array();

	if($query->rowCount()){
		$lastId = 0;
	   foreach($result as $row){
		 
		 if($lastId != $row['id']) {
			 $newsItem = new NewsItem();
			 
			 $newsItem->setId($row['id']);
			 $newsItem->setDateCreated($row['datum']);
			 $newsItem->setAuthor($row['autor']);
			 $newsItem->setTitle($row['naslov']);
			 $newsItem->setContent($row['sazetak']);
			 $newsItem->setDetailedContent($row['tekst']);
			 
			 foreach($result as $subrow) {
				if ($subrow['novost_id'] == $row['id']) {
					$comment = new CommentItem();
					$commentList = $newsItem->getComments();
					
					$comment->setId($subrow['k_id']);
					$comment->setDateCreated($subrow['k_datum']);
					$comment->setAuthor($subrow['k_autor']);
					$comment->setContent($subrow['k_tekst']);
					$comment->setEmail($subrow['k_email']);
					
					array_push($commentList, $comment);
					$newsItem->setComments($commentList);
				}
			 }
			 array_push($toReturn, $newsItem);
		 }
		 $lastId = $row['id'];
	   }
		
	}else{
	   echo 'No results found'; 
	}
	
	return $toReturn;
};

function fetchNewsItemWithComments($id) {
	
	$preparedQuery = "SELECT * FROM novost LEFT OUTER JOIN komentar ON novost.id = komentar.novost_id WHERE novost.id = :id";
	
	$query = getDbContext()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':id' => $id));

	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	if($query->rowCount()){
	   foreach($result as $row){
	 	
		 $newsItem = new NewsItem();
		 
		 $newsItem->setId($row['id']);
		 $newsItem->setDateCreated($row['datum']);
		 $newsItem->setAuthor($row['autor']);
		 $newsItem->setTitle($row['naslov']);
		 $newsItem->setContent($row['sazetak']);
		 $newsItem->setDetailedContent($row['tekst']);
		 
		 foreach($result as $subrow) {
			if ($subrow['novost_id'] == $row['id']) {
				$comment = new CommentItem();
				$commentList = $newsItem->getComments();
				
				$comment->setId($subrow['k_id']);
				$comment->setDateCreated($subrow['k_datum']);
				$comment->setAuthor($subrow['k_autor']);
				$comment->setContent($subrow['k_tekst']);
				$comment->setEmail($subrow['k_email']);
				
				array_push($commentList, $comment);
				$newsItem->setComments($commentList);
			}
		 }

	
		 return $newsItem;
		 }
		
	}else{
	   echo 'No results found'; 
	}
	
};

function saveComment($comment, $id) {
	
	$preparedQuery = "INSERT INTO komentar (k_autor, k_email, k_tekst, novost_id) VALUES (:author, :email, :content, :id)";
	
	$query = getDbContext()->prepare($preparedQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$query->execute(array(':author' => $comment->getAuthor(),':email' => $comment->getEmail(), ':content' => $comment->getContent() ,':id' => $id));

	
};