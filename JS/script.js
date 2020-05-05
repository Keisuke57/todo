$(function(){
  $('#bar-nav').click(function(){
    $('header').fadeIn();
    $('#bar-nav').fadeOut();
  });
  $('#modal-nav span').click(function(){
    $('header').fadeOut();
    $('#bar-nav').fadeIn();
  });

  $('#complete').click(function(){
    $('#modal-show').fadeIn();
  });
  $('#modal-close').click(function(){
    $('#modal-show').fadeOut();
  });
  $(window).scroll(function (){
        $('.fadein').each(function(){
            var position = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > position - windowHeight + 200){
              $(this).addClass('active');
            }
        });
    });
});
