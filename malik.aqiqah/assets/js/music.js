function music()
{
    $(".navbar").css("display","block");
    $(".button-menu").css("display","block");
    $("#mute").css("display","block");
    $("body").css("overflow","auto");
    $("body").css("height","auto");
    var myAudio = $("#audio")[0];
    if (myAudio.duration > 0 && !myAudio.paused) {
    }
    else myAudio.play();
}