function validateEmail(element) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var valid = re.test(email.value);
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
	if (document.getElementsByClassName("invalid").length > 0)
		document.getElementById("submit").disabled = true;
	else
		document.getElementById("submit").disabled = false;
}