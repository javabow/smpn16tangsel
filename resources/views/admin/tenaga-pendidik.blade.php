@extends('admin-templates.admin-templates')
@section('title')
Admin Page SMKN 16 Tangerang Selatan | Staff - Tenaga Pendidik
@endsection
@section('title-header')
  Staff Management - Tenaga Pendidik
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('admin-templates.alert-box')
    <p>
      <a class="btn btn-info" href="{{ url('admin/tenaga-pendidik/create') }}">Add Tenaga Pendidik <i class="fas fa-plus"></i></a>
    </p>
    <table class="display myTable" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Biodata</th>
          <th>Email</th>
          <th>Subjects</th>
          <th>Position</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($staff as $s)
          <tr val="{{ $s->id }}">
            <td>{{ $s->id }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ $s->biodata }}</td>
            <td>{{ $s->email }}</td>
            <td>{{ $s->subjects }}</td>
            <td>{{ $s->position }}</td>
            <td>{{ $s->created_at }}</td>
            <td>{{ $s->updated_at }}</td>
            <td class="row">
              <form class="col-md-6 p-0" action="{{ url('admin/tenaga-pendidik/'.$s->id.'/edit') }}" method="get">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </button>
              </form>
              <form id="delete" class="col-md-6 p-0" action="{{ url('admin/tenaga-pendidik/'.$s->id) }}" method="post">
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
