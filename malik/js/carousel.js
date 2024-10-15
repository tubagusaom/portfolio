/******************Add the story ******************/
const image_profile = [
    ['./images/profile_img.jpg','Malik'],
    ['./images/profile_img.jpg','ikram'],
    ['./images/profile_img.jpg','amina'],
    ['./images/profile_img.jpg','amal'],
    ['./images/profile_img.jpg','amine'],
    ['./images/profile_img.jpg','loy'],
    ['./images/profile_img.jpg','loy'],
    ['./images/profile_img.jpg','loy'],
    ['./images/profile_img.jpg','loy'],
    ['./images/profile_img.jpg','loy'],
    ['./images/profile_img.jpg','loy'],
    ['./images/profile_img.jpg','loy'],
    ['./images/profile_img.jpg','loy'],
    ['./images/profile_img.jpg','loy'],
    ['./images/profile_img.jpg','loy'],
]
const story_container = document.querySelector('.owl-carousel.items');
if(story_container){
    for (var i = 0; i < image_profile.length; i++) {
        const parentDiv = document.createElement('div');
        parentDiv.classList.add("item_s");
        parentDiv.innerHTML = `
            <img src="${image_profile[i][0]}">
            <p>${image_profile[i][1]}</p>
            `;
        story_container.appendChild(parentDiv);
    }
}


$(document).ready(function(){
    $(".owl-carousel").owlCarousel();
});

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:5,
    responsiveClass:true,
    responsive:{
        0:{
            items:5,
            nav:true
        },
        500:{
            items:7,
            nav:false
        }
    }
})