
window.onload = function() {
	var beadsLeft = document.getElementsByClassName("bead");
	
	for (i = 0; i < beadsLeft.length; i++){
		var statusL = window.getComputedStyle(beadsLeft[i],null)
			.getPropertyValue("Float");
		if (statusL == "left") {
			beadsLeft[i].style.cssFloat = "right";
		} else {
			beadsLeft[i].style.cssFloat = "left";
		}
	}	
}