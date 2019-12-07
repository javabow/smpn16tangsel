$(document).ready(function() {
  // navbar style
  h = $('header').height()+'px';
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll > 55 && !$('.filter').hasClass('filter-scrolled')) {
      $('.filter').addClass('filter-scrolled');
      $('.filter').css('top', h);
    } else if (scroll <= 55 && $('.filter').hasClass('filter-scrolled')){
      $('.filter').removeClass('filter-scrolled');
    }
  });
});
