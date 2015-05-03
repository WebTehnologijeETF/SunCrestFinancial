var xmlHttp;
if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlHttp = new XMLHttpRequest();
  }
else {
	// code for IE6, IE5
  xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }



function loadHome() { 
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
		}
    }
	
	xmlHttp.open("GET","pages/home.html",true);
	xmlHttp.send();
}

function loadExRate() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
		}
    }
	
	xmlHttp.open("GET","pages/exrate.html",true);
	xmlHttp.send();
}

function loadPartners() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
		}
    }
	
	xmlHttp.open("GET","pages/partners.html",true);
	xmlHttp.send();
}

function loadContact() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
		}
    }
	
	xmlHttp.open("GET","pages/contact.html",true);
	xmlHttp.send();
}