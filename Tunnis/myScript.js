function popup() {
alert("Tere!")
}

console.log("Kirjutame midagi Javascript-i konsooli");
//alert("See on tegelikult päris kole aken");

function mytime()
   {
   var d=new Date();
   ap="am";
   h=d.getHours();
   m=d.getMinutes();
   s=d.getSeconds();
   if (h>11) { ap = "pm"; }
   if (h>12) { h = h-12; }
   if (h==0) { h = 12; }
   if (m<10) { m = "0" + m; }
   if (s<10) { s = "0" + s; }
   document.getElementById('timehere').innerHTML=h + ":" + m + ":" + s + " " + ap;
   t=setTimeout('mytime()',500);
   }
