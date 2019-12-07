<div class="alert-box">
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <strong><i class="fas fa-exclamation-triangle"></i> {{ $message }}</strong>
    </div>
  @endif
  @if ($message = Session::get('danger'))
    <div class="alert alert-danger">
      <strong><i class="fas fa-exclamation-triangle"></i> {{ $message }}</strong>
    </div>
  @endif
  @if ($errors->any())
      <div class="alert alert-danger px-5">
        <p class="h5"><strong>Ups.. Error Submit Form <i class="fas fa-exclamation-triangle"></i> </strong></p>
          <ul class="pl-3">
              @foreach ($errors->all() as $error)
                  <li><strong>{{ $error }}</strong></li>
              @endforeach
          </ul>
      </div>
  @endif
</div>
