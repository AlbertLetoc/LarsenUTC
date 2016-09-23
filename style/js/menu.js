$(".dropdown").hover(function () {
    $(this).children(".dropdown-menu").first().fadeIn(0);
},
function () {
    $(this).children(".dropdown-menu").first().fadeOut(0);
});