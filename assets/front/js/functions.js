
/* -------------------------------
	* Testimonials slider
---------------------------------- */
$(window).scroll(function(){
    if ($(window).scrollTop() >= 1) {
       $('header').addClass('fixed');
    }
    else {
       $('header').removeClass('fixed');
    }
});


$('.testimonial-slides').slick({
  dots: true,
  arrows: false,
  infinite: true,
  speed: 2000,
  autoplay: true,
  slidesToShow: 4,
  slidesToScroll: 2,
  adaptiveHeight: true,
	responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.testimonial-slides-main').slick({
	dots: true,
	arrows: false,
	infinite: true,
	speed: 300,
	autoplay: true,
	slidesToShow: 1,
	adaptiveHeight: true
});

$("#button").click(function() {
  $('html, body').animate({
      scrollTop: $("#myButton").offset().top
  }, 1000);
});
$("#button1").click(function() {
  $('html, body').animate({
    scrollTop: $("#myButton").offset().top
  }, 1000);
});
$("#features").click(function() {
  $('html, body').animate({
    scrollTop: $("#myfeatures").offset().top
  }, 1000);
});
 $("#listing").click(function() {
  $('html, body').animate({
    scrollTop: $("#myListing").offset().top
  }, 1000);
});

$("#Price").click(function() {
  $('html, body').animate({
    scrollTop: $("#myPrice").offset().top
  }, 1000);
});
$("#home-top").click(function() {
  $('html, body').animate({
    scrollTop: $("#myTop").offset().top
  }, 1000);
});

/*Main Navigation Function Start*/
if (jQuery(".top-nav .menu-list").length != '') {
    jQuery('.top-nav .menu-list').slicknav({
        prependTo: '.top-nav'
    });
}
if (jQuery(".slicknav_menu").length != '') {
    $(document).mouseup(function (e) {
        var container = $(".slicknav_menu");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            jQuery('.top-nav .menu-list').slicknav('close');
        }
    });
}
/*Main Navigation Function EnD*/


