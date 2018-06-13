// parallaxing


$(document).scroll(function() {
        var $movebg = $(window).scrollTop() * -0.3;
        $('.backImg').css('background-positionY', $movebg + 'px');
});
