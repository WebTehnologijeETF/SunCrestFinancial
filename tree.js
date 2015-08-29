(function(){
	document.addEventListener('DOMContentLoaded', function(){ 
		// your code goes here

		addNewEvent(
			document.getElementsByClassName('workTimeTitle')[0],
			'click',
			expandWorkSection
		 );

		addNewEvent(
			document.getElementsByClassName('workDayTitle')[0],
			'click',
			expandWorkDaySection
		 );

		addNewEvent(
			document.getElementsByClassName('holidayTitle')[0],
			'click',
			expandHolidaySection
		 );

		addNewEvent(
			document.getElementsByClassName('pauseTitle')[0],
			'click',
			expandPauseSection
		 );

	}, false);
})();

function expandWorkDaySection() {
	toggleClass(document.getElementsByClassName('workDay')[0], 'hide');
}

function expandHolidaySection() {
	toggleClass(document.getElementsByClassName('holiday')[0], 'hide');
}

function expandPauseSection() {
	toggleClass(document.getElementsByClassName('pause')[0], 'hide');
}

function expandWorkSection() {
	toggleClass(document.getElementsByClassName('workTime')[0], 'hide');
}

function addNewEvent(element, evnt, funct) {
   // less IE9
	if (element.attachEvent) {
		return element.attachEvent('on' + evnt, funct);
	} else {
		return element.addEventListener(evnt, funct, false);
	}
}

function toggleClass(element, className){
	if (!element || !className){
		return;
	}

	var classString = element.className, 
		nameIndex = classString.indexOf(className);

	if (nameIndex == -1) {
		classString += ' ' + className;
	}
	else {
		classString = classString.substr(0, nameIndex) + classString.substr(nameIndex+className.length);
	}

	element.className = classString;
}