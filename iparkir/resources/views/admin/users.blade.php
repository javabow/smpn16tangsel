@extends('layouts.admin')
@section('title')
Admin Page iParkir | Users
@endsection
@section('title-header')
  Users Management
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('layouts.alert-box')
    <p>
      <a class="btn btn-info" href="{{ url('admin/users/create') }}">Add User <i class="fas fa-plus"></i></a>
    </p>
    <table class="display myTable" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Email</th>
          <th>User Role</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr val="{{ $user->id }}">
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->userRoles->name }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td class="row">
              <form class="col-md-6 p-0" action="{{ url('admin/users/'.$user->id.'/edit') }}" method="get">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </button>
              </form>
              <form id="delete" class="col-md-6 p-0" action="{{ url('admin/users/'.$user->id) }}" method="post">
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
