var emSize = parseFloat($("html").css("font-size"));

//onload
$(window).on("load",function() {
	setTimeout(loader,300);
	function loader(){
		$("body").addClass("loaded");
	}
});

//cover image
$(".thumb img").fillBox();

//scrollreveal
ScrollReveal().reveal(".sr-btm",{
    distance: "50px",
    duration: 600,
    delay: 300,
    easing: "cubic-bezier(.2,.4,.1,1)"
});

//sticky header
$(window).scroll(function() {
    var mainHeader = $(".main-header").innerHeight();
    var topHeader = $(".top-header").innerHeight();
    var scrolls = $(window).scrollTop();
    if (scrolls > mainHeader) {
        $(".main-header").addClass("sticky").css("transform","translateY(-"+topHeader+"px)");
    } else {
        $(".main-header").removeClass("sticky").css("transform","translateY(0)");
    }
    
    $(".banner-area .thumb").css({
        "transform": "translate3d(0, "+scrolls/3.5+"px, 0)"
    });
});

//bbtn to top
$(".btn-top").click(function(){
    $("body,html").animate({scrollTop:0},200);
});

//ellipsis
$("[ellipsis]").dotdotdot({
    ellipsis	: " ...",
});

//upload
$(".input-upload").each(function(){
    $(this).click(function(){
        $(this).parents().eq(2).find(".upload").trigger("click");
        getFile();
    });
});

function getFile(){
    $(".upload").change(function(e){
        var fileName = $(this).parent().find(".input-upload").text().length;
        var upload = e.target.files[0].name;
        var fileType = this.files[0].type;
        var validImageTypes = ["image/gif", "image/jpeg", "image/png"];

        $(this).parent().find(".input-upload").text(upload).attr("title",""+upload+"");
        
        if(fileName => 1){
            $(this).parent().find(".form-control").addClass("focus");
        }
    });
}