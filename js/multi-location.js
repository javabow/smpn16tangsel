$(document).on('change', '#loclen', function() {
  thisval = $(this).val();
  oldLocContainer = $('#loc-container').html();
  len = $('#loc-container').find('input[name="location_name[]"]').length;
  selisih = thisval - len;

  if (selisih > 0) {
    for (var i = len+1; i <= thisval; i++) {
      html = '<div class="ss'+i+'"><p>Lokasi '+i+'</p> <label>Nama Lokasi</label> <input class="form-control" type="text" name="location_name[]" > <label>Alamat Lokasi</label> <input class="form-control" type="text" name="location_address[]" > <label>Latitude</label> <input class="form-control" type="number" name="lat[]" step="any"> <label>Longitude</label> <input class="form-control" type="number" name="lng[]" step="any"><br></div> ';
      $('#loc-container').append(html);
    }
  } else {
    // $('#loc-container').html('');
    for (var i = len; i > len+selisih; i--) {
      // html = '<br><p>Lokasi '+i+'</p> <label>Nama Lokasi</label> <input class="form-control" type="text" name="location_name[]" > <label>Alamat Lokasi</label> <input class="form-control" type="text" name="location_address[]" > <label>Latitude</label> <input class="form-control" type="number" name="lat[]" step="any"> <label>Longitude</label> <input class="form-control" type="number" name="lng[]" step="any">';
      $('#loc-container').find('.ss'+i).remove();
    }
  }

});
