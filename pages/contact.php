<?php

$fname = htmlentities($_POST["firstname"]);
$lname = htmlentities($_POST["lastname"]);
$email = htmlentities($_POST["email"]);
$adress = htmlentities($_POST["adress"]);
$city = htmlentities($_POST["city"]);
$zip = htmlentities($_POST["zip"]);
$ctype = htmlentities($_POST["commenttype"]);
$comment = htmlentities($_POST["comment"]);

$fnameError = empty($fname) ? "" : "hide";
$lnameError = empty($lname) ? "" : "hide";
$emailError = empty($email) ? "" : "hide";
$commentError = empty($fname) ? "" : "hide";


echo <<< _HTML

<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/style/site.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<script src="/app.js"></script>
	<script src="/validation.js"></script>
	<script src="/tree.js" defer></script>
	<title>SunCrest Financial - Home</title>
</head>

<body onload="loadHome()">
	<div id="header">
	    <div class="top-line"></div>
		<div id="banner">
			<div id="logo">
				<img src="/content/logosc.png" alt="SunCrest Financial Logo" class="logo_pic"/>
			</div>
			<div id="navigation">
				<nav>
					<a href="#" onclick="loadHome()">Home</a>
					<a href="#" onclick="loadAbout()">O nama</a>
					<a href="#" onclick="loadExRate()">Kursna lista</a>
					<a href="#" onclick="loadPartners()">Partneri</a>
					<a href="#" onclick="loadContact()">Kontakt</a>
				</nav>
			</div>
		</div>
	</div>
	
	<div id="main">

<div id="content">
	<div class="page_title centered">Kontakt forma</div>
	<div class="confrimation-section">
		<h4>Provjerite da li ste ispravno popunili kontakt formu</h4>
		<div class="information">
			<table>
				<tr>
					<td>Ime</td>
					<td class="confirm-name">$fname</td>
				</tr>
				<tr>
					<td>Prezime</td>
					<td class="confirm-lastname">$lname</td>
				</tr>
				<tr>
					<td>Email</td>
					<td class="confirm-email">$email</td>
				</tr>
				<tr>
					<td>Adresa</td>
					<td class="confirm-address">$adress</td>
				</tr>
				<tr>
					<td>Grad</td>
					<td class="confirm-city">$city</td>
				</tr>
				<tr>
					<td>Zip</td>
					<td class="confirm-zip">$zip</td>
				</tr>
				<tr>
					<td>Tip komenatara</td>
					<td class="confirm-comment-type">$ctype</td>
				</tr>
				<tr>
					<td>Komentar</td>
					<td class="confirm-comment">$comment</td>
				</tr>
			</table>
		</div>
		<div class="inline-group">
			<h5>Da li ste sigurni da želite poslati ove podatke?</h5>

			<input type="submit" name="submit" onclick="sendEmail()" value="Siguran sam" />
		</div>
			<h6>Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke</h6>
	</div>
	<form action="./contact.php" method="POST" class="contact">
		<div>
			<div class="input">
				<div class="field">
					<input type="text" name="firstname" id="firstname" placeholder="Ime" class="required" value="$fname" onblur="validateRequired(this)"/>
				</div>
				<span class="error-message $fnameError">*Molim vas unesite vrijednost</span>
			</div>
			<div class="input">
				<div class="field">
					<input type="text" name="lastname" id="lastname" placeholder="Prezime" class="required" value="$lname" onblur="validateRequired(this)"/>
				</div>
				<span class="error-message $lnameError">*Molim vas unesite vrijednost</span>
			</div>
			<div class="input">
				<div class="field">
					<input type="email" name="email" id="email" placeholder="Email" class="required" value="$email" onblur="validateEmail(this)"/>
				</div>
				<span class="error-message $emailError">*Email nije validan</span>
			</div>
			<div class="input">
				<div class="field">
					<input type="text" name="adress" id="adress" placeholder="Adresa" value="$adress"/>
				</div>
			</div>
			<div class="input">
				<div class="field">
					<input type="text" name="city" id="city" placeholder="Grad" onblur="validateOnline(this)" value="$city"/>
				</div>
				<span class="error-message-online hide"></span>
			</div>
			<div class="input">
				<div class="field">
					<input type="text" name="zip" id="zip" placeholder="Zip" onblur="validateOnline(this)" value="$zip"/>
				</div>
				<span class="error-message-online hide"></span>
			</div>
			<div class="input">
				<div class="field">
					<select name="commenttype" id="commenttype" class="custom-select">
						<option value="0">Tip komentara</option>
						<option>Pritužba</option>
						<option>Prijedlog</option>
						<option>Pohvala</option>
						<option>Upit</option>
						<option>Molba</option>
						<option>Podrška</option>
					</select>
				</div>
			</div>
		</div>
		<div class="input comment">
			<div class="field">
				<textarea rows="4" name="comment" id="comment" placeholder="Komentar..." class="required" onblur="validateRequired(this)" value="$comment"></textarea>
			</div>
			<span class="error-message $commentError">*Molim vas unesite vrijednost</span>
		</div>
		<div class="submit">
			<input type="submit" name="submit" id="submit" value="Podnesi" class="button-disabled" />
		</div>
	</form>
</div>

</div>
	
	<div id="footer">
		<span>© Copyright  Adnan Ahmethodžić 2015</span>
		<span>Sva prava zadržana. Zabranjeno preuzimanje sadržaja bez dozvole izdavača.</span>
	</div>
</body>

</html>

_HTML;

?>