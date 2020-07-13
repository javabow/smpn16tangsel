@extends('admin-templates.admin-templates')
@section('title')
Admin Page SMKN 16 Tangerang Selatan | Ekstrakurikuler
@endsection
@section('title-header')
  Ekstrakurikuler
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('admin-templates.alert-box')
    <p>
      <a class="btn btn-info" href="{{ url('admin/ekstrakurikuler/create') }}">Add Ekstrakurikuler <i class="fas fa-plus"></i></a>
    </p>
    <table class="display myTable" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Icon</th>
          <th>Color</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ekstrakurikuler as $eks)
          <tr val="{{ $eks->id }}">
            <td>{{ $eks->id }}</td>
            <td>{{ $eks->name }}</td>
            <td><i class="{{ $eks->icon }}"></i> {{ $eks->icon }}</td>
            <td class="text-center">
              <p>{{ $eks->color }}</p>
              <div class="top-cat-area d-inline-block">
                <div class="top-cat-items inc-bg-color">
                  <div class="item {{ $eks->color }}">
                    <a class="p-3" href="#"></a>
                  </div>
                </div>
              </div>
            </td>
            <td>{{ $eks->created_at }}</td>
            <td>{{ $eks->updated_at }}</td>
            <td class="row">
              <form class="col-md-6 p-0" action="{{ url('admin/ekstrakurikuler/'.$eks->id.'/edit') }}" method="get">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </button>
              </form>
              <form id="delete" class="col-md-6 p-0" action="{{ url('admin/ekstrakurikuler/'.$eks->id) }}" method="post">
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
  </script>
@endsection
