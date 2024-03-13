@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Teacher</h1>
</div>

<div class="container">
    <h1>Data Teacher</h1>
        <a href="/dashboard/teacher/create" class="btn btn-primary mb-3">Create new Teacher</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Mata pelajaran</th>
                <th>Alamat</th>
                <th width="105px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($teacher as $teacher)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $teacher->name }}</td>
              <td>{{ $teacher->gender }}</td>
              <td>{{ $teacher->date_of_birth }}</td>
              <td>{{ $teacher->subject_taught }}</td>
              <td>{{ $teacher->address }}</td>
              <td>
                <a href="/dashboard/teacher/{{ $teacher->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/teacher/{{ $teacher->id }}" method="post" class="d-inline">
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
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'gender', name: 'gender'},
            {data: 'date_of_birth', name: 'date_of_birth'},
            {data: 'subject_taught', name: 'subject_taught'},
            {data: 'address', name: 'address'},
        ]
    });
      
  });
</script>

@endsection