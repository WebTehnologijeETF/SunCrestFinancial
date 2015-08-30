<?php

require("../services/news.php");

$id = $_GET['id'];

$content = generateNewsItemHtml(getNewsFromFiles(), $id);

echo <<< _HTML

		
<div id="content">
	$content
</div>


_HTML;

