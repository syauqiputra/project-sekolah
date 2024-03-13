@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelas</h1>
      </div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif      
<div class="container">
    <h1>Data Kelas</h1>
        <a href="/dashboard/kelas/create" class="btn btn-primary mb-3">Create New Kelas</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th width="105px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($kelas as $kelas)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kelas->name }}</td>
              <td>
                <a href="/dashboard/kelas/{{ $kelas->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/kelas/{{ $kelas->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach()
        </tbody>
    </table>
</div>
      
<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        columns: [
            {data: 'name', name: 'name'},
        ]
    });
      
  });
</script>

@endsection