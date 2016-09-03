$(".dropdown").hover(function () {
    $(this).children(".dropdown-menu").first().fadeIn();
},
function () {
    $(this).children(".dropdown-menu").first().fadeOut();
});