  $(document).on('change', '#fotolen', function() {
    // len = $('.lfm').length;
    thisval = $(this).val();
    $('#lfm-container').html('');
    for (var i = 1; i <= thisval; i++) {
      html = '<div class="input-group"> <span class="input-group-btn"> <a data-input="foto'+i+'" data-preview="holder'+i+'" class="btn btn-primary lfm"> <i class="fas fa-image"></i> Choose </a> </span> <input id="foto'+i+'" class="form-control" type="text" name="foto[]"> </div> <img id="holder'+i+'" style="margin-top:15px;max-height:100px;"><br><br>';
      $('#lfm-container').append(html);
    }
    $('.lfm').filemanager('image', {prefix: route_prefix});
  });
