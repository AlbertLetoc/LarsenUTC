$(".dropdown").hover(function () {
    $(this).children(".dropdown-menu").first().fadeIn(0);
},
function () {
    $(this).children(".dropdown-menu").first().fadeOut(0);
});

$(".user-icon").click(function() {
    $('.user-overlay').fadeIn(200);
    $('body').css('top', -$("body").scrollTop() + 'px');
    $('body').addClass("body-noscroll");
    $(".user-box-close").click(function () {
        $(this).unbind('click');
        $('.user-overlay').fadeOut(200);        
        $('body').removeClass("body-noscroll");
        $('body').removeAttr("style");
    })
})
