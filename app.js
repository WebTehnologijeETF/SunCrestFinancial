var xmlHttp;
if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlHttp = new XMLHttpRequest();
  }
else {
	// code for IE6, IE5
  xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
}

function openNews(id) { 
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "SunCrest Financial Inc.";
		}
    }
	
	xmlHttp.open("GET","pages/newsItem.php?id=" + id,true);
	xmlHttp.send();
}

function loadHome() { 
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.title = "SunCrest Financial Inc.";
			
			var result = JSON.parse(xmlHttp.responseText);
			var outerContainer = null;
			var i;
			document.getElementById("content").innerHTML = "";
			for(i = 0; i < result.length; i++) {
			
				var d = '<div class=\"news\">' + 
				'<div class="title">' +  result[i].title + '</div>' +
				'<div class="author">' +  result[i].author + '</div>' + 
				'<div class="date">' + result[i].dateCreated + '</div>' + 
				'<div class="content">' +
				'<img src="http://www.nasa.gov/images/content/133202main_d_reichart_image2.jpg" alt="image" class="news-image">' + 
					result[i].content + '... <a href="#" onclick="loadItem('+result[i].id+')" class="more">Prikazi vise</a> ... ' +
					'<h4 class="comment-title">Komentari('+result[i].comments.length+') </h4>'
				'</div>' + 
				'</div>';
				
				outerContainer = document.createElement("div");
				outerContainer.innerHTML = d;
				document.getElementById("content").appendChild(outerContainer);
			}
		}
    }
	
	xmlHttp.open("GET","../services/news.php",true);
	xmlHttp.send();
}

function loadItem(id) {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.title = "SunCrest Financial Inc.";
			
			var result = JSON.parse(xmlHttp.responseText);
			var outerContainer = null;
			document.getElementById("content").innerHTML = "";
			var d = '<div class=\"news\">' + 
			'<div class="title">' +  result.title + '</div>' +
			'<div class="author">' +  result.author + '</div>' + 
			'<div class="date">' + result.dateCreated + '</div>' + 
			'<div class="content">' +
			'<img src="http://www.nasa.gov/images/content/133202main_d_reichart_image2.jpg" alt="image" class="news-image">' + 
				result.content +
			'</div>' +
			'</div>' +
			'<h4 class="comment-title">Komentari: </h4>';
			var i;
			for (i = 0; i < result.comments.length; i++)
				d += '<div class="comments"> <span>'+ result.comments[i].author +'&nbsp</span><span>'+result.comments[i].dateCreated+'</span><p>'+result.comments[i].content+'</p> </div>'
				d += '<div class="comment-section">' +
					'<input type="text" placeholder="Ime" id="c_name"class="comment-text">'+
				    '<br>'+
				    '<input type="text" placeholder="Email" id="c_email" class="comment-text">'+
				    '<br>'+ 
					 '<textarea type="text" class="comment-write" id="c_comment"="Dodaj komentar"></textarea>' +
					 '<br>' +
					 '<input type="button" value="Dodaj" onclick="addComment('+ result.id +', this)" class="add-comment">' +
					 '</div>';
			outerContainer = document.createElement("div");
			outerContainer.innerHTML = d;
			document.getElementById("content").appendChild(outerContainer);
		}
    }
	
	xmlHttp.open("GET","../services/news.php?id=" + id,true);
	xmlHttp.send();
}

function loadAbout() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "O nama";
		}
    }
	
	xmlHttp.open("GET","../pages/about.html",true);
	xmlHttp.send();
	
	// defer excetution a little till dom is ready
	setTimeout(function(){ attachEventListeners(); }, 500);
}

function loadExRate() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "Kursna lista";
			getRates();
		}
    }
	
	xmlHttp.open("GET","../pages/exrate.html",true);
	xmlHttp.send();
}

function loadPartners() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "Partneri";
		}
    }
	
	xmlHttp.open("GET","../pages/partners.html",true);
	xmlHttp.send();
}

function loadContact() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "Kontakt forma";
		}
    }
	
	xmlHttp.open("GET","../pages/contact.html",true);
	xmlHttp.send();
}

function getRates() {
	// HTTP Request URL je izbildan preko YQL buildera na developer.yahoo.com
	
	var url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.xchange%20where%20pair%20in%20(%22EURBAM%22%2C%20%22AUDBAM%22%2C%20%22HRKBAM%22%2C%20%22JPYBAM%22%2C%20%22CHFBAM%22%2C%20%22TRYBAM%22%2C%20%22GBPBAM%22%2C%20%22USDBAM%22%2C%20%22RUBBAM%22%2C%20%22CNYBAM%22%2C%20%22RSDBAM%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
	var request;
	
	if (window.XMLHttpRequest) {
	  request = new XMLHttpRequest();
    }
	else {
	  request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			var result = JSON.parse(request.responseText);
			updateRates(result);
		}
    }
	
	request.open("GET", url, true);
	request.send();

}

function updateRates(rates) {
	console.log("A" + rates);
	
	var tableRows = document.getElementsByClassName("exrate")[0].children[0].children[0].children;
	
	var i;
	for (i = 1; i <= tableRows.length - 1; i++)
		{
			tableRows[i].children[4].innerHTML = rates.query.results.rate[i-1].Bid;
			tableRows[i].children[5].innerHTML = rates.query.results.rate[i-1].Rate;
			tableRows[i].children[6].innerHTML = rates.query.results.rate[i-1].Ask;		
		}
}

function sendEmail() {
	var fname = document.getElementById("firstname").value;
	var lname = document.getElementById("lastname").value;
	var email = document.getElementById("email").value;
	var adress = document.getElementById("adress").value;
	var city = document.getElementById("city").value;
	var zip = document.getElementById("zip").value;
	var commentType = document.getElementById("commenttype").selectedOptions[0].innerText;
	var comment = document.getElementById("comment").value;
	
	var data = 
	{
		fname : fname,
		lname : lname,
		email : email,
		adress : adress,
		city : city,
		zip : zip,
		commentType : commentType,
		comment : comment
	};
	
	var payload = JSON.stringify(data);
	
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			
		}
    }
	
	xmlHttp.open("POST",".././mail/mail.php",true);
	xmlHttp.setRequestHeader("Content-type","application/json");
	xmlHttp.send(payload);
	
}

function addComment(id, el) {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			loadItem(id);
		}
    }
	
	var comment = document.getElementById("c_comment").value;
	var name = document.getElementById("c_name").value;
	var email = document.getElementById("c_name").value;
	
	var result = { author: name, email: email, content: comment };
	
	if (!comment) {
		comment = "Zaboravili ste unijeti tekst";
		return;
	}
	
	
	var payload = JSON.stringify(result)
	xmlHttp.open("POST",".././services/comment.php?id="+id,true);
	xmlHttp.setRequestHeader("Content-type","application/json");
	xmlHttp.send(payload);
}

function loadLogin() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "Login";
		}
    }
	
	xmlHttp.open("GET","pages/login.html",true);
	xmlHttp.send();
    
	// defer excetution a little till dom is ready
	setTimeout(function(){ attachEventListeners(); }, 500);
}

function loadAdminUsers() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "Admin korisnici";
		}
    }
	
	xmlHttp.open("GET","admin.user.html",true);
	xmlHttp.send();
}

function loadAdminNews() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "Admin news";
		}
    }
	
	xmlHttp.open("GET","admin.news.html",true);
	xmlHttp.send();
}