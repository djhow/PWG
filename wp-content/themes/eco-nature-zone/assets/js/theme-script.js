var eco_nature_zone_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    eco_nature_zone_btn.addClass('show');
  } else {
    eco_nature_zone_btn.removeClass('show');
  }
});

eco_nature_zone_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).keyup(function(e) {
  if (e.key === "Escape") {
    if (jQuery('#offcanvas-menu').hasClass("offcanvas-menu-active")) {
      jQuery('#offcanvas-menu').removeClass("offcanvas-menu-active")
    }
  }
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
    dots: false,
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
    mouseDrag: true
  });

  // Create number indicators
  var numSlides = jQuery('.owl-carousel .owl-item').length;
  for (var i = 1; i <= numSlides; i++) {
    jQuery('.slider-indicators').append('<span class="indicator">' + i + '</span>');
  }

  // Highlight current indicator on change
  owl.on('changed.owl.carousel', function(event) {
    jQuery('.indicator').removeClass('active');
    jQuery('.indicator').eq(event.item.index).addClass('active');
  });

  // Optional: Click on indicator to go to slide
  jQuery('.slider-indicators').on('click', '.indicator', function() {
    var index = jQuery(this).index();
    owl.trigger('to.owl.carousel', [index, 300]);
  });
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

jQuery('.header-search-wrapper .search-main').click(function(){
  jQuery('.search-form-main').toggleClass('active-search');
  jQuery('.search-form-main .search-field').focus();
});

jQuery(".featured h3.main-heading").html(function(){
  var text2 = jQuery(this).text().trim().split(" ");
  
  if(text2.length > 1) {
      var secondWord = text2[text2.length - 1]; // Get the second word
      // Wrap the second word in <span> element
      text2[text2.length - 1] = `<span class='last-word'>${secondWord}</span>`;
      return text2.join(" ");
  }
});

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