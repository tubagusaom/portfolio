// let sound = document.getElementById("audioId");
// sound.currentTime = 0;
// sound.loop = true; //if you want it to restart playing automatically when it ends
// sound.play();



// window.addEventListener('load', function () {
//         var audioCtx = new (window.AudioContext || window.webkitAudioContext)();
//         var source = audioCtx.createBufferSource();
//         var xhr = new XMLHttpRequest();
//         xhr.open('GET', 'http://wtb.indonesia-kompeten.com/assets/files/audio/marry_your_daughter.mp3');
//         xhr.responseType = 'arraybuffer';
//         xhr.addEventListener('load', function (r) {
//             audioCtx.decodeAudioData(
//                     xhr.response,
//                     function (buffer) {
//                         source.buffer = buffer;
//                         source.connect(audioCtx.destination);
//                         source.loop = false;
//                     });
//             source.start(0);
//         });
//         xhr.send();
//     });
