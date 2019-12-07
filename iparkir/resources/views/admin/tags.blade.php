@extends('layouts.admin')
@section('title')
Admin Page iParkir | Tags
@endsection
@section('title-header')
  Tags
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('layouts.alert-box')
    <p><a class="btn btn-info" href="#" data-toggle="modal" data-target="#addModal">Add Tag<i class="fas fa-plus ml-2"></i></a></p>
    <table class="display myTable" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th class="th-name">Name <strong><small>(Double click field Name untuk Edit Tags)</small></strong></th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
          <tr>
            <td class="tag-id" val="{{ $tag->id }}">{{ $tag->id }}</td>
            <td class="tag_name position-relative"><input class="form-control tag-name" name="name{{ session('lang') }}" type="text" value="{{ $tag->name }}" disabled>
              <div class="tag-hack" style="position:absolute; left:0; right:0; top:0; bottom:0;"></div></td>
            <td>{{ $tag->created_at }}</td>
            <td class="d-flex">
              <a class="m-1 btn-update-tag btn btn-primary px-2" href="{{ url('admin/tags/'.$tag->id.'/edit') }}"><i class="fas fa-edit"></i> Update</a>
              <a class="m-1 btn-delete-tag btn btn-danger px-2" href="{{ url('admin/tags/'.$tag->id) }}"><i class="fas fa-trash"></i> Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <!-- Modal Form Add -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add Tag</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formAdd" action="{{ url('admin/tags') }}" method="post">
        <div class="modal-body">
            <div class="form-group">
              <label for="name">Tag Name</label>
              <input class="form-control" type="text" name="name" >
            </div>
            <input type="hidden" name="_method" value="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
      </div>
    </div>
  </div>

@endsection
@section('js')
  <script src="{{ asset('js/sweetalert2.js') }}" charset="utf-8"></script>

  <script type="text/javascript">
    $(document).on('click', '.tag_name  div', function() {
      parent = $(this).parents('.tag_name');
      tag_name = parent.find('.tag-name');
      tag_hack = parent.find('.tag-hack');
      tag_name.prop('disabled', false);
      tag_hack.hide();
    });
    $(document).on('click', '.btn-update-tag', function(e){
      e.preventDefault();
      updateTag(this);
    });
    $(document).on('keypress', '.tag-name', function(e){
      if (e.which == 13) {
        updateTag(this);
      }
    });

    function updateTag(dis)
    {
      parent = $(dis).parents('tr');
      id = parent.find('.tag-id').attr('val');
      name = parent.find('.tag-name').val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
         type: 'post',
         url: '{{ url('admin/inline-update-tags') }}/'+id,
         data: {'name':name},
         success: function (response) {
           $('#content-cont').html($(response).find('#content-cont').html());
           location.href = '#';
           timerAlert();
         },
         error: function(jqXHR, textStatus, errorThrown) {
         }
      });
    }

    $(document).on('click', '.th-name', function(e) {
      $('.tag_name div').click();
    });

    $(document).on('click', '.btn-delete-tag', function(e) {
      e.preventDefault();
      parent = $(this).parents('tr');
      id = parent.find('.tag-id').attr('val');
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
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
             type: 'post',
             url: '{{ url('admin/inline-destroy-tags') }}/'+id,
             success: function (response) {
               $('#content-cont').html($(response).find('#content-cont').html());
               location.href = '#';
               timerAlert();
             },
             error: function(jqXHR, textStatus, errorThrown) {
             }
          });
        }
      })
    });
  </script>
@endsection
