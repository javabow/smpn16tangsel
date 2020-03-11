@extends('admin-templates.admin-templates')
@section('title')
Admin Page iParkir | Posts
@endsection
@section('title-header')
  Posts
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
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
    </div>
    <p>
      <a class="btn btn-info" href="{{ url('admin/posts/create') }}">Add Post <i class="fas fa-plus"></i></a>
    </p>
    <table class="display myTable" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Status</th>
          <th>Categories</th>
          <th>Tags</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr val="{{ $post->id }}">
            <td>{{ $post->id }}</td>
            <td>{{ $post->{'title'.session('lang')} }}</td>
            <td>
              <select class="post-status form-control" name="id_post_status">
                @foreach ($postStatus as $pStatus)
                  <option value="{{ $pStatus->id }}" {{ ($post->id_post_status == $pStatus->id) ? 'selected' : '' }}>{{ $pStatus->name }}</option>
                @endforeach
                {{-- {{ $post->postStatus->{'name'.session('lang')} }} --}}
              </select>
            </td>
            <td>
              @foreach ($post->categories as $category)
                {{ $category->{'name'.session('lang')} }} ,
              @endforeach
            </td>
            <td>
              @foreach ($post->tags as $tag)
                {{ $tag->{'name'.session('lang')} }} ,
              @endforeach
            </td>
            <td>{{ $post->updated_at }}</td>
            <td class="row">
              <form class="col-md-6 p-0" action="{{ url('admin/posts/'.$post->id.'/edit') }}" method="get">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </button>
              </form>
              <form id="delete" class="col-md-6 p-0" action="{{ url('admin/posts/'.$post->id) }}" method="post">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
@section('js')
  <script src="{{ asset('js/sweetalert2.js') }}" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('click', 'form#delete button', function(e) {
      e.preventDefault();
      form = $(this).parents('form#delete');
      swal = Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
      }).then((result) => {
        if (result.value) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          );
          form.submit();
        }
      })
    });

    $(document).on('change', '.post-status', function(e) {
      id_post_status = $(this).children("option:selected").val();
      id = $(this).parents('tr').attr('val');
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
         type: 'post',
         url: '{{ url('admin/posts/edit-status') }}/'+id,
         data: {'id_post_status':id_post_status},
         success: function (response) {
           $('#content-cont').html($(response).find('#content-cont').html());
           location.href = '#';
           timerAlert();
         },
         error: function(jqXHR, textStatus, errorThrown) {
         }
      });
    });
  </script>
@endsection
