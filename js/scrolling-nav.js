//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        var hash = $anchor.attr('href').substring(1);
        if (window.location.pathname !== '/') return;
        $('html, body').stop().animate({
            scrollTop: $(hash).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
