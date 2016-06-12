function showLocalTime(){
	var currentTime = new Date();
	var hours = currentTime.getHours();
	var minutes = currentTime.getMinutes();
	var seconds = currentTime.getSeconds();

	minutes = checkTime(minutes);
	seconds = checkTime(seconds);
	var timeStamp = hours + ":" + minutes + ":" + seconds;


	document.cookie = "localTime = " + timeStamp + "; expires = ";
	document.getElementById("localTime").innerHTML = timeStamp;
	
	var now = new Date();
	var time = now.getTime();
	var expireTime = time + 1000*36000;
	now.setTime(expireTime);
	var tempExp = 'Wed, 31 Oct 2012 08:50:17 GMT';
	document.cookie = "localTime = " + timeStamp + "; expires = "+now.toGMTString()+';path=/';
	//document.cookie = 'cookie=ok;expires='+now.toGMTString()+';path=/';
	//var t = setTimeout(showLocalTime, 500);
}

function checkTime(time){
	if (time < 10){
		time = "0" + time;
	}
	return time;
}
	
