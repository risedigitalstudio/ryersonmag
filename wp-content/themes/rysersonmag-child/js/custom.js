$ = jQuery;
$(document).ready(function() {
    $(function() {
      AOS.init();
    });
    
    
$( ".post-title-subtitle" ).each(function( index ) {
  $(this).on('mouseover', function () {
    $(this).siblings('.taxonomy-thumb').addClass('hovered');
  })
    
  $(this).on('mouseout', function () {
    $(this).siblings('.taxonomy-thumb').removeClass('hovered');
  })
});    
    

$( ".taxonomy-thumb" ).each(function( index ) {
  $(this).on('mouseover', function () {
    $(this).siblings('.post-title-subtitle').children().addClass('hoveredArchive');
  })
    
  $(this).on('mouseout', function () {
    $(this).siblings('.post-title-subtitle').children().removeClass('hoveredArchive');
  })
});
    
    

var space = " ";
$( ".page-title").each(function( index ) {
    var arr = $(this).text().split(space);
    var words="";
    for (i = 0; i < arr.length; i++) {
        words+= "<span>"+arr[i]+"&nbsp;</span>";
    }
    $(this).html(words);
});
    

var re = /(\s+)/;
$( ".featured-cat-heading").each(function( index ) {
    var arr = $(this).text().split(re);
    
    var words="";
    for (i = 0; i < arr.length; i++) {
        if (arr[i] !== "" && arr[i] !== " ") {
            words+= "<span>"+arr[i]+"&nbsp;</span>";
        }
    }
    $(this).html(words);
});

    



    
    
//    scroll intent nav
var lastScrollTop = 0;
$(window).scroll(function(event){
   var theTop = $(this).scrollTop();
    if (theTop > 200) {
   if (theTop > lastScrollTop){
       //downscroll
       $('header.not-homepg').addClass('neg-margin');
   } else {
      // upscrol
      $('header.not-homepg').removeClass('neg-margin');
   }
   lastScrollTop = theTop;
    } 
});
    
    
    
  $('.past-issue-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 4,    
//          autoplay: true,
      infinite: true,
      autoplaySpeed: 1800,
      arrows: true,
      prevArrow: $('.prev'),
      nextArrow: $('.next'),
        responsive: [
          {
            breakpoint: 1100,
            settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            }
          },
          {
            breakpoint: 992,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            }
          },
          {
            breakpoint: 767,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            }
          }
        ]   
  });    

    
    $('#hamburgerMenu').on('click', function () {
        $('#headerDrawer').fadeIn(150);
        $('#focusDrawerStart').focus();
    })        
    
    $('#viewAllTopics').on('click', function () {
        $('#headerDrawer').show();
        $('#focusDrawerStart').focus();
    })
    
//    start for keyboard users
    $('#focusDrawerStop').on('focus', function() {
      $(this).on('keydown', function () {
        $('#focusDrawerStart').focus();
      })
    });
//    end for keyboard users
    
    $(document).on('keyup', function(e) {
      if (e.key == "Escape") $('#drawerClose').click();
    });
    
    
    $('#drawerClose').on('click', function () {
        $('#headerDrawer').fadeOut(150);
    })
    
    
    $('#mobileHamburgerMenu').on('click', function () {
        $('#mobileHeaderDrawer').show();
    })    
    
    $('#mobileDrawerClose').on('click', function () {
        $('#mobileHeaderDrawer').hide();
    })
        
//    $('.search-submit').on('click', function () {
//        $('#headerDrawer').hide();
//    })
//    
    $('.intro-block-body-drop-cap p:first-of-type').html(function (i, html) {
        return html.replace(/^[^a-zA-Z]*([a-zA-Z])/g, '<span class="drop-cap">$1</span>');
    });


})