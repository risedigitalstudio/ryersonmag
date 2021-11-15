$ = jQuery;
$(document).ready(function() {
    $(function() {
      AOS.init();
    });
    
    
    $('.intro-block-body p:first-of-type').html(function (i, html) {
        return html.replace(/^[^a-zA-Z]*([a-zA-Z])/g, '<span class="drop-cap">$1</span>');
    });
    
})