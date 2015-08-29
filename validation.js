function validateEmail(element) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var valid = re.test(element.value);
	if (valid) {
		element.className = "required";
	}
	else {
		element.className = "required invalid";
	}
	
	validateButton();
}

function validateRequired(element) {
	if (element.value == "") {
		element.className = "required invalid";
	}
	else {
		element.className = "required";
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