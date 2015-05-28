<?php

require("../services/news.php");

$id = $_GET['id'];

$content = generateNewsItemHtml($id);

echo <<< _HTML


<div id="sidebar1" class="sidebar">
			<img src="/content/boa_logo.jpg" alt="ad" class="logo_pic"/>
</div>
		
<div id="content">
	$content

	
	<div class="contact comment">
		<div class="input">
			<label>Ime:</label>
			<div class="field">
				<input type="text" id="firstname" name="firstname" />
			</div>
			<div class="input">
				<label>Email:</label>
				<div class="field">
					<input type="email" class="required" id="email" name="email" />
				</div>
			</div>
			<div class="input">
				<label>Komentar:</label>
				<div class="field">
					<textarea rows="4" class="required" id="comment" name="comment" >
					</textarea>
				</div>
			</div>	
		</div>
		
		<div class="submit">
			<input type="submit" id="submit" name="submit" value="Komentiraj" onclick="comment($id)"/>
		</div>
	</div>
</div>


_HTML;

