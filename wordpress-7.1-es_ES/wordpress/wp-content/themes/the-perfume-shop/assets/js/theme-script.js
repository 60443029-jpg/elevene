function the_perfume_shop_openNav() {
  jQuery(".sidenav").addClass('show');
}
function the_perfume_shop_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

jQuery(document).ready(function ($) {
  // Menu Js
  $('.submenu-toggle').click(function () {
    $(this).toggleClass('button-toggle-active');
    var currentClass = $(this).attr('data-toggle-target');
    $(currentClass).toggleClass('submenu-toggle-active');
  });
  $('.skip-link-menu-start').focus(function () {
    if (!$("#offcanvas-menu #primary-nav-offcanvas").length == 0) {
      $("#offcanvas-menu #primary-nav-offcanvas ul li:last-child a").focus();
    }
  });
  // Menu Toggle Js
  $('.navbar-control-offcanvas').click(function () {
    $(this).addClass('active');
    $('body').addClass('body-scroll-locked');
    $('#offcanvas-menu').toggleClass('offcanvas-menu-active');
    $('.button-offcanvas-close').focus();
  });
  $('.offcanvas-close .button-offcanvas-close').click(function () {
      $('#offcanvas-menu').removeClass('offcanvas-menu-active');
      $('.navbar-control-offcanvas').removeClass('active');
      $('body').removeClass('body-scroll-locked');
      setTimeout(function () {
          $('.navbar-control-offcanvas').focus();
      }, 300);
  });
  $('#offcanvas-menu').click(function () {
      $('#offcanvas-menu').removeClass('offcanvas-menu-active');
      $('.navbar-control-offcanvas').removeClass('active');
      $('body').removeClass('body-scroll-locked');
  });
  $(".offcanvas-wraper").click(function (e) {
      e.stopPropagation(); //stops click event from reaching document
  });
  $('.skip-link-menu-end').on('focus', function () {
    $('.button-offcanvas-close').focus();
  });
});

var the_perfume_shop_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    the_perfume_shop_btn.addClass('show');
  } else {
    the_perfume_shop_btn.removeClass('show');
  }
});

the_perfume_shop_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
    var owl = jQuery('#top-slider .owl-carousel');
      owl.owlCarousel({
      margin: 0,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: false,
      dots: true,
      navText : ['<i class="fas fa-angle-double-up" aria-hidden="true"></i>','<i class="fas fa-angle-double-down" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 1
        },
        768: {
          items: 1
        },
        1000: {
          items: 1
        },
        1200: {
          items: 1
        }
      },
      autoplayHoverPause : false,
      mouseDrag: true,
    });

    var owl = jQuery('#product .owl-carousel');
      owl.owlCarousel({
      margin: 25,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: false,
      dots: false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        576: {
          items: 2
        },
        768: {
          items: 3
        },
        1000: {
          items: 4
        },
        1200: {
          items: 4
        }
      },
      autoplayHoverPause : false,
      mouseDrag: true,
    });
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
  jQuery(".loading2").delay(2000).fadeOut("slow");
});

jQuery('.header-search-wrapper .search-main a').click(function(){
  jQuery('.search-form-main').toggleClass('active-search');
  jQuery('.search-form-main .search-field').focus();
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.top-info').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.top-info').addClass("stick_header");
    } else {
      jQuery('.top-info').removeClass("stick_header");
    }
  }
});