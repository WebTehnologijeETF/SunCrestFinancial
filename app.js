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
			document.title = "SunCrest Financial Inc.";
		}
    }
	
	xmlHttp.open("GET","pages/home.html",true);
	xmlHttp.send();
}

function loadExRate() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "Kursna lista";
			getRates();
		}
    }
	
	xmlHttp.open("GET","pages/exrate.html",true);
	xmlHttp.send();
}

function loadPartners() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "Partneri";
		}
    }
	
	xmlHttp.open("GET","pages/partners.html",true);
	xmlHttp.send();
}

function loadContact() {
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			document.getElementById("main").innerHTML = xmlHttp.responseText;
			document.title = "Kontakt forma";
		}
    }
	
	xmlHttp.open("GET","pages/contact.html",true);
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