

$(document).ready(function()
{
    $('.contact').click(function (e) 
    {
        $('.card').toggleClass('active');
        $('.banner').toggleClass('active');
        $('.photo').toggleClass('active');
        $('.card ul').toggleClass('active');
        $('.contact').toggleClass('active');
        $('.social-media-banner').toggleClass('active');
        $('.email-form').toggleClass('active');
        var buttonText = $('button.contact#main-button').text();
        if (buttonText === 'kembali')
        {
            buttonText = 'klik untuk informasi detail';
            $('button.contact#main-button').text(buttonText);
        }
        else
        {
            buttonText = 'kembali';
            $('button.contact#main-button').text(buttonText);
        }
    });
});

//turn on to make the photo follow mouse
// $(document).ready(function()
// {
//     $(document).mousemove(function( event ) 
//     {
//         var docWidth = $(document).width();
//         var docHeight = $(document).height();
//         var xValue = (event.clientX/docWidth)*100;
//         var yValue = (event.clientY/docHeight)*100;
//         $('.photo').css('background-position', xValue+'%,'+yValue+'%');
//     });
// });

