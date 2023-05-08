$(document).ready(function() {

    $('.color-choose input').on('click', function() {
        var headphonesColor = $(this).attr('data-image');
  
        $('.color-choose input').removeClass('active');
        $(this).addClass('active');
    });
  
  });