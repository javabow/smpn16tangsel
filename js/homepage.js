// $(document).ready(function() {
//   $('.addition1, .addition2, .addition3').mouseover(function() {
//     $(this).find('div').css('background-color', 'rgba(0, 0, 0, 0.3)');
//     $(this).find('div').find('p').animate({
//       'margin-bottom' : 'auto',
//       'width': '500px'
//     }, 2000);
//   });
//   $('.addition1, .addition2, .addition3').mouseout(function() {
//     $(this).find('div').css('background-color', '');
//     // $(this).find('div p').css('margin-bottom', '20%');
//   });
//
// })

$(document).ready(function() {
  // btn b-addition
  $('.b-addition-l').click(function() {
    $('.addition1, .addition2, .addition3').slideToggle(1000);
    icon = $(this).find('.icon');
    if (icon.hasClass('icon-down')) {
      icon.hide();
      $('.b-addition-l .icon-up').show();
    } else {
      icon.hide();
      $('.b-addition-l .icon-down').show();
    }
  });
});

// image rotate
$(document).ready(function(){
  $('.anim-ltr').css('transform', 'translateX(-850px)');
  $('.anim-rtl').css('transform', 'translateX(850px)');
  $('.anim-rotate').css('transform', 'scale(0)');
  $('.addition1, .addition2, .addition3').hide();

  $(window).scroll(function(e) {
    var hT = $('.anim-ltr').offset().top,
        hH = $('.anim-ltr').outerHeight(),
        wH = $(window).height(),
        wS = $(this).scrollTop();
    if (wS > (hT+hH-wH) - 450 && !$('.anim-ltr').hasClass('scrolled')){
      anime({
        targets: '.anim-ltr',
        translateX: 0,
        duration: 2000
      });
      anime({
        targets: '.anim-rtl',
        translateX: 0,
        duration: 2000
      });
      $('.anim-ltr').addClass('scrolled');
    } else if(wS <= (hT+hH-wH) - 450 && $('.anim-ltr').hasClass('scrolled')) {
      anime({
        targets: '.anim-ltr',
        translateX: -850,
        duration: 2000
      });
      anime({
        targets: '.anim-rtl',
        translateX: 850,
        duration: 2000
      });
      $('.anim-ltr').removeClass('scrolled');
    }
    hT = $('.addition').offset().top;
    hH = $('.addition').outerHeight();
    wH = $(window).height();
    wS = $(this).scrollTop();
    if (wS > (hT+hH-wH)  && !$('.anim-rotate').hasClass('scrolled')){
      anime({
        targets: '.anim-rotate',
        scale: 1,
        duration: 1000,
        complete: function(anim) {
          $('.anim-rotate').addClass('scrolled');
        }
      });

    } else if (wS <= (hT+hH+wH-1100)  && $('.anim-rotate').hasClass('scrolled')) {
      console.log('wS : '+ wS);
      console.log('(hT+hH+wH) : '+ (hT+hH+wH));
      console.log('wS <= (hT+hH+wH) : ' + (wS <= (hT+hH+wH)));
      console.log('scrollUp');

      anime({
        targets: '.anim-rotate',
        scale: 0,
        duration: 700,
        complete: function(anim) {
          $('.anim-rotate').removeClass('scrolled');
        }
      });
    }

    addition123 = $('.addition1, .addition2, .addition3');
    hT = $('#b-addition-l').offset().top,
    hH = $('#b-addition-l').outerHeight(),
    wS = $(this).scrollTop();
    if (wS > (hT+hH-wH) && !$('.addition1').hasClass('scrolled')){
      addition123.slideDown(1000);
      $('.addition1').addClass('scrolled');
    }

  });
});
