function wyswietl(T,t){  T.nextSibling.style.display=t?'block':'none'  }


var IdNo = 0;
function time (hours,mins,secs,span)
{

   this.id = "time" + IdNo++;
   window[this.id] = this;

   this.hours = hours;
   this.mins = mins;
   this.secs = secs;
   this.span = span;

   this.show = show;

}

function show()
{

   if( this.hours < 0){
       document.getElementById( this.span ).innerHTML = 'Koniec';}
   if( this.secs > 0 ) {
       this.secs--;
   } else if( this.secs == 0 && this.mins > 0 ) {
       this.mins--;
       this.secs=59;
   } else if ( this.secs == 0 && this.mins == 0 && this.hours > 0 ) {
       this.hours--;
       this.mins=59;
       this.secs=59;
   }
   if( this.hours == 0 && this.mins == 0 && this.secs == 0 ) {
       document.getElementById( this.span ).innerHTML = 'Koniec';
   } else {

       document.getElementById( this.span ).innerHTML = 'Pozosta³o: ' +
       (( this.hours < 10 ) ? ( "0" + this.hours ) : this.hours) + ":" +
       (( this.mins < 10 ) ? ( "0" + this.mins ) : this.mins) + ":" +
       (( this.secs < 10 ) ? ( "0" + this.secs ) : this.secs);

   }
   setTimeout("window."+this.id+".show()",999);
}


function load(god,min,sek)
{

   var timer = new time(god,min,sek,"fgh");
   timer.show();
}

  var zegarekTimerID = null;
  function showtime()
  {
     var now = new Date();
     var hours = now.getHours();
     var minutes = now.getMinutes();
     var seconds = now.getSeconds();
     var timeValue = ((hours < 10) ? "0" : "") + + hours;
     timeValue  += ((minutes < 10) ? ":0" : ":") + minutes;
     timeValue  += ((seconds < 10) ? ":0" : ":") + seconds;
     window.status = timeValue;
     zegarekTimerID = setTimeout("showtime()",999);
  }
