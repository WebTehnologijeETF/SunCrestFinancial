<?php

require_once('dataAccess.php');

$name = htmlspecialchars($_POST['firstname']);
$email = htmlspecialchars($_POST['email']);
$text = htmlspecialchars($_POST['comment']);

$newsId = htmlspecialchars($_POST['id']);

$comment = new CommentItem();

$comment->setAuthor($name);
$comment->setEmail($email);
$comment->setContent($text);



saveComment($comment, $newsId);