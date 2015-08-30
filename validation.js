function validateEmail(element) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var valid = re.test(element.value);
	if (valid) {
		element.className = "required";
		element.parentElement.parentElement.getElementsByClassName("error-message")[0].className = "error-message hide";
	}
	else {
		element.className = "required invalid";
		element.parentElement.parentElement.getElementsByClassName("error-message")[0].className = "error-message";
	}
	
	validateButton();
}

function validateRequired(element) {
	if (element.value == "") {
		element.className = "required invalid";
		element.parentElement.parentElement.getElementsByClassName("error-message")[0].className = "error-message";
	}
	else {
		element.className = "required";
		element.parentElement.parentElement.getElementsByClassName("error-message")[0].className = "error-message hide";
	}
	
	validateButton();
}

function validateButton() {
	var isAnyRequiredEmpty = [].slice.call(document.getElementsByClassName("required")).map(function(e) { if (e.value == "") return "empty"}).indexOf("empty") > -1; 
	
	if (document.getElementsByClassName("invalid").length > 0 || isAnyRequiredEmpty) {
		document.getElementById("submit").disabled = true;
		document.getElementById("submit").className = "button-disabled";
	}
	else {
		document.getElementById("submit").disabled = false;
		document.getElementById("submit").className = "";
	}
}

function validateOnline(element) {
	var city = document.getElementById("city").value;
	var zip = document.getElementById("zip").value;
	
	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {		
			var response = JSON.parse(xmlHttp.response);
			if (Object.keys(response)[0] == "greska") {
				element.className = "required invalid";
				element.parentElement.parentElement.getElementsByClassName("error-message-online")[0].className = "error-message-online";
				element.parentElement.parentElement.getElementsByClassName("error-message-online")[0].innerHTML = response["greska"];
			}
			else {
				element.className = "required";
				element.parentElement.parentElement.parentElement.getElementsByClassName("error-message-online")[0].className = "error-message-online hide";
				element.parentElement.parentElement.parentElement.getElementsByClassName("error-message-online")[1].className = "error-message-online hide";				
			}
		}
    }
	
	xmlHttp.open("GET","http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto=" + city + "&postanskiBroj=" + zip,true);
	xmlHttp.send();
}