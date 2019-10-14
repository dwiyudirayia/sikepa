var emSize = parseFloat($("html").css("font-size"));

//cover image
$(".thumb img").fillBox();

//sticky header
$(window).scroll(function() {
    var topbar = $(".top-header").innerHeight();
    var scrolls = $(window).scrollTop();
    if (scrolls > topbar) {
        $(".main-header").addClass("sticky").css("transform","translateY(-"+topbar+"px)");
    } else {
        $(".main-header").removeClass("sticky").css("transform","translateY(0)");
    }
    
    $(".banner-area .thumb").css({
        "transform": "translate3d(0, "+scrolls/3.5+"px, 0)"
        //"opacity": opacity
    });
});

//ellipsis
$("[ellipsis]").dotdotdot({
    ellipsis	: " ...",
});