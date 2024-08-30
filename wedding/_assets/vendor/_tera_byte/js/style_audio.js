

var audioAutoPlay = document.getElementById("audio1").autoplay;

// const myVideo = document.querySelector('audio');
const myVideo = document.getElementById("audio1");
const tbvol = document.getElementById("volume");

// document.getElementById("audio1").play();

function playPause(x) {
  if (myVideo.paused) {
    myVideo.play();
    document.getElementById("volume").className = "bi bi-volume-down-fill";
    // document.getElementById("volume").className = "bi bi-caret-right-fill";
  } else {
    myVideo.pause();
    document.getElementById("volume").className = "bi bi-volume-mute-fill";
    // document.getElementById("volume").className = "bi bi-pause";
  }
}

var tbpopup = document.getElementById('tbpopupBox');

// untuk mendapatkan link untuk membuka tbpopup
var mpLink = document.getElementById("tbpopupLink");

// untuk mendapatkan aksi elemen close
var close = document.getElementsByClassName("closetb")[0];

// membuka tbpopup ketika link di klik
// mpLink.onclick = function() {
$("#tbpopupLink").on('click', function(){
  // tbpopup.style.display = "block";
  // $('#'+tbpopup).fadeOut('slow');

  $('#tbpopupBox').css("display","block");
  $('#tbpopupBox').fadeOut("slow");
})

// membuka tbpopup ketika elemen di klik
// close.onclick = function() {
$(".closetb").on('click', function(){
  // tbvol.style.display = "block";
  $('#volume').css("display","block");
  // $('#audio1').play();
  $("#audio1").trigger("play");

  // tbpopup.style.display = "none";
  // $('#tbpopupBox').css("display","none");

  $('#tbpopupBox').addClass('animated slideOutUp durationtb3');
  $('#divTb').removeClass('hide');
  // $('#tbpopupBox').addClass('hide');
  $("#tbpopup").fadeOut('slow');
})

// membuka tbpopup ketika user melakukan klik diluar area popup
// window.onclick = function(event) {
//   if (event.target == tbpopup) {
//       tbpopup.style.display = "none";
//       $('#'+tbpopup).fadeOut('slow');
//   }
// }





// var audioTB = document.querySelector('audio');
// audioTB.play();

// function toggleMute() {
//     var videoTB = document.getElementById("video1");
//
//     if (videoTB.muted) {
// 				// videoTB.style.display = "none";
//         videoTB.muted = false;
//     } else {
//         debugger;
//         videoTB.muted = true;
//         videoTB.play()
//     }
// }
//
// $(document).ready(function () {
//     setTimeout(toggleMute, 1000);
// })


// var sourceTB = "<?php echo base_url() ?>_assets/audio/cant_take_my_eyes_off_you.mp3";
// // alert(sourceTB);
//
//  var audioTB = document.createElement("audio");
//  //
//  audioTB.autoplay = true;
//  //
//  audioTB.load()
//  audioTB.addEventListener("load", function() {
//      audioTB.play();
//  }, true);
//  audioTB.src = sourceTB;


 // document.addEventListener("DOMContentLoaded", function() {
  //     var audioTB = new Audio("<?php echo base_url() ?>_assets/audio/cant_take_my_eyes_off_you.mp3");
  //     audio.play();
 // });

// $(document).ready(function() {
//   $("#audio1").get(0).play();
//   $("#audio1").prop("volume", 0).animate({volume: 0.4}, 6000);
// });
