$(document).on('change', '#loclen', function() {
  thisval = $(this).val();
  $('#loc-container').html('');
  for (var i = 1; i <= thisval; i++) {
    html = '<br><p>Lokasi '+i+'</p> <label>Nama Lokasi</label> <input class="form-control" type="text" name="location_name[]" > <label>Alamat Lokasi</label> <input class="form-control" type="text" name="location_address[]" > <label>Latitude</label> <input class="form-control" type="number" name="lat[]" step="any"> <label>Longitude</label> <input class="form-control" type="number" name="lng[]" step="any">';
    $('#loc-container').append(html);
  }
});
