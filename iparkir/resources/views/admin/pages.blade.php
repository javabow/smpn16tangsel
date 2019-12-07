@extends('layouts.admin')
@section('title')
Admin Page iParkir | Pages
@endsection
@section('title-header')
  Pages
@endsection
@section('content')
  	<table class="display myTable" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Title</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php($i=1)
        @foreach ($pages as $page)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $page->name }}</td>
            <td>{{ $page->pageStatus->name }}</td>
            <td class="d-flex">
                <a class="m-1 btn btn-primary px-2" href="{{ url('admin/pages/'.$page->id.'/edit') }}"><i class="fas fa-edit"></i> Edit</a>
                @if ($page->id === 1)
                  <a class="m-1 btn btn-success px-2" href="{{ url('admin/pages/custom/'.$page->id) }}"><i class="fas fa-palette"></i> Custom</a>
                @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection
