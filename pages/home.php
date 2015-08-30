<?php

require("../services/news.php");

$content = generateNewsHtml(getNewsFromFiles());

echo <<< _HTML
		
<div id="content">
	$content
</div>


_HTML;

