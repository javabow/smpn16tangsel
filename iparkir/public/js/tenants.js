  $('.24-jam').on('click', function() {
     if($(this).is(':checked')) {
       openHour = $(this).parents('.opening-hours').find('.open-hour');
       closeHour = $(this).parents('.opening-hours').find('.close-hour');
       hourTutup = $(this).parents('.opening-hours').find('.tutup-jam');
       openHour.val('12:00 AM');
       closeHour.val('12:00 AM');
       openHour.prop('disabled', true);
       closeHour.prop('disabled', true);
       hourTutup.prop('checked', false);
     } else {
       openHour.val('07:00 AM');
       closeHour.val('09:00 PM');
       openHour.prop('disabled', false);
       closeHour.prop('disabled', false);
     }
  });
  $('.tutup-jam').on('click', function() {
     if($(this).is(':checked')) {
       openHour = $(this).parents('.opening-hours').find('.open-hour');
       closeHour = $(this).parents('.opening-hours').find('.close-hour');
       hour24 = $(this).parents('.opening-hours').find('.24-jam');
       openHour.val('-');
       closeHour.val('-');
       openHour.prop('disabled', true);
       closeHour.prop('disabled', true);
       hour24.prop('checked', false);
     } else {
       openHour.prop('disabled', false);
       closeHour.prop('disabled', false);
       openHour.val('07:00 AM');
       closeHour.val('09:00 PM');
     }
  });
  $('.form-submit').on('submit', function(e) {
    $('.open-hour').prop('disabled', false);
    $('.close-hour').prop('disabled', false);
  });
  $('.m-timepicker').timepicker({
    defaultTime: '01:00:00 AM',
  });
