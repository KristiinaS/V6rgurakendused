function showLocalTime(){
	var currentTime = new Date();
	var hours = currentTime.getHours();
	var minutes = currentTime.getMinutes();
	var seconds = currentTime.getSeconds();

	minutes = checkTime(minutes);
	seconds = checkTime(seconds);
	var timeStamp = hours + ":" + minutes + ":" + seconds;

	document.cookie = "localTime = " + timeStamp;
	document.getElementById("localTime").innerHTML = timeStamp;
	
	
	//var t = setTimeout(showLocalTime, 500);
}

function checkTime(time){
	if (time < 10){
		time = "0" + time;
	}
	return time;
}
	

