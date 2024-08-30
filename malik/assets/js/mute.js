function mute()
{
music();

var myAudio = document.getElementById("audio");
var mute = document.getElementById("mute");

if(myAudio.muted == true) {
    myAudio.muted = false;
    mute.innerHTML = '<i class="fal fa-volume-up"></i>';
}
    else if(myAudio.muted == false) {
    myAudio.muted = true;
    mute.innerHTML = '<i class="fal fa-volume-slash"></i>';
    }
}