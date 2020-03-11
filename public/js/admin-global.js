$(document).ready(function() {
  $('.myTable').DataTable();
})

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
})

function timerAlert(){
  alertBox = $('.alert-box');
  if (alertBox.length) {
    setTimeout(function(){
      alertBox.find('.alert').fadeOut();
    }, 3000);
  }
};
