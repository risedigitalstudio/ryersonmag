$ = jQuery;
$(document).ready(function() {
    $(function() {
      AOS.init();
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