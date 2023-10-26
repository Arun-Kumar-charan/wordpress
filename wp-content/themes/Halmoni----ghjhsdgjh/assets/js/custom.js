function menu_open() {
  jQuery(".main-menu").css({ "transform": "translateX(0)" })
}
function menu_close() {
  jQuery(".main-menu").css({ "transform": "translateX(320px)" })
}

jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() >= 100) {
    jQuery('header').addClass('fixed');
  }
  else {
    jQuery('header').removeClass('fixed');
  }
});
jQuery(document).ready(function () {
  jQuery('.banner-slider').slick({
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 1700,
    arrows: true,
    responsive: [

      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          arrows: false,
          dots: true
        }
      }
    ]
  });
  
  jQuery('.js-link').on('click', function (e) {
    e.preventDefault();
    jQuery(this).parent().next('.dropdown-item-custom').slideToggle(200);
    jQuery(this).toggleClass('active');
  });
  // jQuery(".js-range-slider").ionRangeSlider({
  //   type: "double",
  //   min: 0,
  //   max: 1000,
  //   from: 30,
  //   to: 100,
  //   grid: false,
  //   prefix: "$"
  // });
  jQuery('.main-menu li a').on('click', function () {
    //alert("ssss");
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: (target.offset().top - 64)
        }, 1000);
        return false;
      }
    }
  });
  if (jQuery(window).width() < 1199) {
    jQuery("header li.menu-item-has-children").append('<div tabindex="0" role="button" class="dropdown-icon-menu"></div>');
    jQuery(".main-menu.mobile-menu .sub-menu").hide();
    jQuery("header .sub-menu").hide();
    jQuery(document).on('click', '.dropdown-icon-menu', function () {
      jQuery(this).prev(".sub-menu").slideToggle();
      jQuery(this).toggleClass('active');
    });
  }
  jQuery('.playpause').click(function (){
    if(jQuery(this).next(".video1").get(0).paused){
          jQuery(this).next(".video1").get(0).play();
          jQuery(this).fadeOut();
          jQuery(this).next(".video1").prop("controls",true); 
          }/*else{
            jQuery(this).children("#video1").get(0).pause();
            jQuery(this).children(".playpause").fadeIn();
          }*/
  });
  // jQuery(".js-range-slider").ionRangeSlider({
  //   type: "double",
  //   min: 0,
  //   max: 1000,
  //   from: 30,
  //   to: 100,
  //   grid: false,
  //   prefix: "â‚¬"
  // });
});

// jQuery('.video1').parent().click(function () {
//   if(jQuery(this).children(".video1").get(0).paused){
//     jQuery(this).children(".video1").get(0).play();
//     jQuery(this).children(".playpause").fadeOut();
//     jQuery(this).children(".video1").prop("controls",true); 
//     }/*else{
//       jQuery(this).children("#video1").get(0).pause();
//       jQuery(this).children(".playpause").fadeIn();
//     }*/
// });




//============================================================= admin video upload js========================================================



