$(document).ready(function () {
$('.scroll-me a').bind('click', function (event) { 
var $anchor = $(this);
$('html, body').stop().animate({
scrollTop: $($anchor.attr('href')).offset().top
}, 1200, 'easeInOutExpo');
event.preventDefault();
});
$('#carousel-slider').carousel({
interval: 3000
});
$.vegas('slideshow', {
backgrounds: [
{ src: 'assets/img/front-page.jpg', fade: 1000, delay: 9000 },
{ src: 'assets/img/3.jpg', fade: 1000, delay: 9000 },
]
})('overlay', {
src: 'assets/img/06.png' 
});
});