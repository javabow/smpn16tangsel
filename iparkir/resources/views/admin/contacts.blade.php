@extends('layouts.admin')
@section('title')
Admin Page iParkir | Contacts
@endsection
@section('title-header')
  Contacts
@endsection
@section('content')
  <div id="content-cont" class="container bg-light p-4">
    @include('layouts.alert-box')
    <table class="display myTable" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Email</th>
          <th>No. Telepon</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)
          <tr val="{{ $contact->id }}">
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->position }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->created_at }}</td>
            <td>{{ $contact->updated_at }}</td>
            <td>
              <form action="{{ url('admin/contacts/'.$contact->id.'/edit') }}" method="get">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i> </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
@section('js')
  {{-- <script src="{{ asset('js/sweetalert2.js') }}" charset="utf-8"></script>
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
  </script> --}}
@endsection
