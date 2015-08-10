$(function() {
    //$("#footer").load("includes/footer.html");
    var unslider = $('.banner').unslider({
        speed: 500,              
        delay: 3000,             
        keys: true,              
        dots: false,              
        fluid: false             
    });
    $('.banner .unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        
        unslider.data('unslider')[fn]();
    });
    var news = $('.news').unslider({
        speed: 500,              
        delay: 3000,             
        keys: true,              
        dots: true,              
        fluid: false             
    });
    var attractions = $('#attractions').unslider({
        speed: 500,              
        delay: 3000,             
        keys: true,              
        dots: false,              
        fluid: false             
    });
    $('#attractions .attractions-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        attractions.data('unslider')[fn]();
    });

});