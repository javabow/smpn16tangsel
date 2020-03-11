@extends('admin-templates.admin-templates')
@section('title')
  Admin Page SMKN 16 Tangerang Selatan | Categories
@endsection
@section('title-header')
  Categories
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('admin-templates.alert-box')
    <p><a class="btn btn-info" href="#" data-toggle="modal" data-target="#addModal">Add Tag<i class="fas fa-plus ml-2"></i></a></p>
    <table class="display myTable" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th class="th-name">Name <strong><small>(Double click field Name untuk Edit Category)</small></strong></th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td class="category-id" val="{{ $category->id }}">{{ $category->id }}</td>
            <td class="category_name position-relative"><input class="form-control category-name" name="name{{ session('lang') }}" type="text" value="{{ $category->name }}" disabled>
              <div class="category-hack" style="position:absolute; left:0; right:0; top:0; bottom:0;"></div></td>
            <td>{{ $category->created_at }}</td>
            <td class="d-flex">
              <a class="m-1 btn-update-category btn btn-primary px-2" href="{{ url('admin/categories/'.$category->id.'/edit') }}"><i class="fas fa-edit"></i> Update</a>
              <a class="m-1 btn-delete-category btn btn-danger px-2" href="{{ url('admin/categories/'.$category->id) }}"><i class="fas fa-trash"></i> Delete</a>
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
          <h5 class="modal-title" id="modalTitle">Add category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formAdd" action="{{ url('admin/categories/add') }}" method="post">
        <div class="modal-body">
            <div class="form-group">
              <label for="name">Category Name</label>
              <input class="form-control" type="text" name="name" >
            </div>
            <div class="form-group">
              <label for="parent">Parent</label>
              <select id="parent-category" class="form-control" name="parent-category">
                <option value="">-- Pilih Parent Category --</option>
                @foreach ($categoriyes as $category)
                  @php($listOpen = '')
                  @php($listClose = '')
                  @for ($i=0; $i < $category->level; $i++)
                    @php($listOpen .= '&nbsp;&nbsp;&nbsp;&nbsp;')
                    @php($listClose .= '&nbsp;&nbsp;&nbsp;&nbsp;')
                  @endfor
                    <option value="{{ $category->id }}">
                      {!! $listOpen . $category->name. ' id : ('.$category->id.')' . $listClose !!}
                    </option>
                @endforeach
              </select>
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
    $(document).on('click', '.category_name  div', function() {
      parent = $(this).parents('.category_name');
      category_name = parent.find('.category-name');
      category_hack = parent.find('.category-hack');
      category_name.prop('disabled', false);
      category_hack.hide();
    });
    $(document).on('click', '.btn-update-category', function(e){
      e.preventDefault();
      updatecategory(this);
    });
    $(document).on('keypress', '.category-name', function(e){
      if (e.which == 13) {
        updatecategory(this);
      }
    });

    function updatecategory(dis)
    {
      parent = $(dis).parents('tr');
      id = parent.find('.category-id').attr('val');
      name = parent.find('.category-name').val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
         type: 'post',
         url: '{{ url('admin/inline-update-categories') }}/'+id,
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
      $('.category_name div').click();
    });

    $(document).on('click', '.btn-delete-category', function(e) {
      e.preventDefault();
      parent = $(this).parents('tr');
      id = parent.find('.category-id').attr('val');
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
             url: '{{ url('admin/inline-destroy-categories') }}/'+id,
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
