var pildiList = document.getElementById("pictures");

function showDetails(el) {
	var pildiList = document.getElementById("pictures");

	if(document.getElementById("hoidja")){
		var smallPictures = pildiList.getElementsByTagName("img");
		var bigPictures = pildiList.getElementsByTagName("a");
		
		for (var i = 0; i < smallPictures.length; ++i) {
			if (smallPictures[i].alt == el){
				var index = i;
			}
		}
		
		var displayPilt = bigPictures[index].href;
		var old = document.getElementById("suurpilt");
		old.src = displayPilt;
		document.getElementById("inf").innerHTML = el;
		document.getElementById("hoidja").style.display = "initial";
	}
}

function hideDetails(){
	document.getElementById("hoidja").style.display = "none";
}


function suurus(el){
  el.removeAttribute("height"); // eemaldab suuruse
  el.removeAttribute("width");
  if (el.width>window.innerWidth || el.height>window.innerHeight){  // ainult liiga suure pildi korral
    if (window.innerWidth >= window.innerHeight){ // lai aken
      el.height=window.innerHeight*0.9; // 90% kõrgune
      if (el.width>window.innerWidth){ // kas element läheb ikka üle piiri?
        el.removeAttribute("height");
        el.width=window.innerWidth*0.9;
      }
    } else { // kitsas aken
      el.width=window.innerWidth*0.9;   // 90% laiune
      if (el.height>window.innerHeight){ // kas element läheb ikka üle piiri?
        el.removeAttribute("width");
        el.height=window.innerHeight*0.9;
      }
    }
  }
}

window.onresize=function() {
	suurpilt=document.getElementById("suurpilt");
	suurus(suurpilt);
}