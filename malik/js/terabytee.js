

// Get the modal
var modal = document.getElementById('myModal');
var divclickimg = document.getElementById('divclickimg');

// Get the images and bind an onclick event on each to insert it inside the modal
// use its "alt" text as a caption
var images = document.querySelectorAll(".img-fluid");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
for(let i = 0; i < images.length; i++){
        images[i].onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
}

// Get the <span> element that closes the modal
var closeimg = document.getElementsByClassName("closeimg")[0];

// When the user clicks on <span> (x), close the modal
divclickimg.onclick = function() {
    modal.style.display = "none";
}

closeimg.onclick = function() {
    modal.style.display = "none";
    modalImg.pause();
}


// Get the modal video
var modalvideo = document.getElementById('myModalvideo');
var divclickvideo = document.getElementById('divclickvideo');

var videocontainer = document.querySelectorAll(".video-container");
var video = document.querySelectorAll(".video-fluid");
// var video = document.getElementsByClassName("video-fluid")[0];
var modalImgvideo = document.getElementById("video01");
var captionText = document.getElementById("caption");
for(let i = 0; i < video.length; i++){
    video[i].onclick = function(){
        modalvideo.style.display = "block";
        modalImgvideo.src = this.src;
        // captionText.innerHTML = this.alt;
    }
}

// Get the <span> element that closes the modal
var closevideo = document.getElementsByClassName("closevideo")[0];

// When the user clicks on <span> (x), close the modal
divclickvideo.onclick = function() {
    modalvideo.style.display = "none";
    modalImgvideo.pause();
}

closevideo.onclick = function() {
    modalvideo.style.display = "none";
    modalImgvideo.pause();
}


// profilmalik.onclick = function() {
//     alert('profil');
// }

// Get the profil modal
var profilmalik = document.getElementById('profil-malik');
var modalprofil = document.getElementById('myModalprofil');
var closeprofil = document.getElementsByClassName("closeprofil")[0];
var divclickprofil = document.getElementById('divclickprofil');

// When the user clicks on <span> (x), close the modal
profilmalik.onclick = function() {
    modalprofil.style.display = "block";
}

closeprofil.onclick = function() {
    modalprofil.style.display = "none";
}

divclickprofil.onclick = function() {
    modalprofil.style.display = "none";
}












// const tabFoto = document.getElementById("pills-home-tab");
// const tabVideos = document.getElementById("pills-profile-tab");

// tabVideos.onclick = function() {

    // document.getElementById("posts_sec").innerHTML = "terabytee";
    // var linkv = "video.php";
    // document.getElementById("saved_sec").this.linkv;
// }

// tabFoto.onclick = function() {

//     // document.getElementById("saved_sec").innerHTML = "terabytee";

//     $("#posts_sec").load("photo.php");
// }
