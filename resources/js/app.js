require('./bootstrap');
$(document).ready(function() {
    $('.modal .close').on('click', function(){
        $(this).fadeOut();
    })
});