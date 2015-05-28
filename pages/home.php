<?php

require("../services/news.php");

$content = generateNewsHtml(getNewsFromDatabase());

echo <<< _HTML


<div id="sidebar1" class="sidebar">
			<img src="/content/boa_logo.jpg" alt="ad" class="logo_pic"/>
</div>
		
<div id="content">
	$content
</div>


_HTML;

