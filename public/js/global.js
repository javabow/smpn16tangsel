$(document).ready(function() {
  $('#loading-wrapper').fadeOut(800);
  setTimeout(function() {
    $('#loading-wrapper').remove();
  }, 500)
});
