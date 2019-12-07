@extends('layouts.admin')
@section('title')
Admin Page Pengelola Parkir | Tenants
@endsection
@section('title-header')
  Data Tenants
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('layouts.alert-box')
    <p>
      <a class="btn btn-info" href="{{ url('admin/tenants/create') }}">Add Tenants <i class="fas fa-plus"></i></a>
    </p>
    <table class="display myTable" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama Tenants</th>
          <th>Deskripsi Tenants</th>
          <th>Alamat</th>
          <th>Nomor Telepon</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php($i = 1)
        @foreach ($tenants as $tenant)
          <tr val="{{ $i }}">
            <td>{{ $tenant->id }}</td>
            <td>{{ $tenant->name }}</td>
            <td>{{ $tenant->description }}</td>
            <td>
              @foreach ($tenant->locations as $key => $location)
                {{ $location->address }}
              @endforeach
            </td>
            <td>{{ $tenant->phone }}
            </td>
            <td>{{ $tenant->created_at }}</td>
            <td>{{ $tenant->updated_at }}</td>
            <td class="row">
              <form class="col-md-6 p-0" action="{{ url('admin/tenants/'.$tenant->id.'/edit') }}" method="get">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </button>
              </form>
              <form id="delete" class="col-md-6 p-0" action="{{ url('admin/tenants/'.$tenant->id) }}" method="post">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i> </button>
              </form>
            </td>
          </tr>
          @php($i++)
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
