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

$(".single-post article:not(.modal-post article)").each(function(){
    $(this).find("iframe").wrap("<figure class='single-media'></figure>");
    $(this).find("img").wrap("<figure class='single-img'></figure>");
    $(this).find("p,h1,h2,h3,h4,h5,figure,li").addClass("sr-btm");
});

//scrollreveal
ScrollReveal().reveal(".sr-btm",{
    distance: "50px",
    duration: 800,
    scale: 1.08,
    delay: 300,
    easing: "cubic-bezier(.2,.4,.1,1)"
});

//sticky header
$(window).scroll(function() {
    var navHeader = $(".nav-header").innerHeight();
    var topHeader = $(".top-header").innerHeight();
    var scrolls = $(window).scrollTop();
    if (scrolls > navHeader) {
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

//modal
$(".modal").on("shown.bs.modal", function() {
	if($("body").hasClass("modal-open")){
		$(this).find(".container").append("<div class='backdrop'></div>");
	}
    
    $(document).keyup(function(e) {
        //if (e.keyCode === 13) $('.save').click();     // enter
        if(e.keyCode === 27){
            $(".backdrop").remove();
            $(".modal").modal("hide");
        }  // esc
    });
	
	$(".backdrop").click(function(){
		$(this).parents(".modal").modal("hide");
		$(".backdrop").remove();
	});
});

$(window).on("load",function(){
    setTimeout(function(){
        $(".auto-modal").modal('show');
    },1000);
});

$(".burger-menu").click(function(){
    $("body").toggleClass("active-menu");
});

//ellipsis
$("[ellipsis]").dotdotdot({
    ellipsis	: " ...",
});