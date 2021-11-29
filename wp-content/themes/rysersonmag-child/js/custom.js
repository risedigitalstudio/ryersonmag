$ = jQuery;
$(document).ready(function() {
    $(function() {
      AOS.init();
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
        $('#headerDrawer').show();
    })    
    
    $('#drawerClose').on('click', function () {
        $('#headerDrawer').hide();
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
    $('.intro-block-body p:first-of-type').html(function (i, html) {
        return html.replace(/^[^a-zA-Z]*([a-zA-Z])/g, '<span class="drop-cap">$1</span>');
    });
    
})