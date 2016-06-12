function showLocalTime(){
	$.get({
		type: 'GET',
		url: 'clock.php',
		success: function (data) {
			var userTime = new Date();			
			var serverTime = data;

			console.info(userTime.valueOf());
			console.info(serverTime);

			var diff= Math.abs(Math.round(userTime-serverTime));
			console.info(diff);

			var hours = userTime.getHours();
			var minutes = userTime.getMinutes();
			var seconds = userTime.getSeconds();
			minutes = checkTime(minutes);
			seconds = checkTime(seconds);

			var timeStamp = hours + ":" + minutes + ":" + seconds;

			document.getElementById("localTime").innerHTML = timeStamp;
			if (diff < 1000) {
				document.getElementById("diff").innerHTML = "Your time is less than 1 second off!";
			}
			else {
				var minutes = parseInt(diff / 60000);
				var seconds = Math.round(diff % 60000 / 10) / 100;
				document.getElementById("diff").innerHTML = "Your time is off by " + minutes + " minutes and "+  seconds +" seconds.";
			}

		}
	});
}

function checkTime(time){
	if (time < 10){
		time = "0" + time;
	}
	return time;
}
	
