@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Student</h1>
</div>

<div class="container">
    <h1>Data Student</h1>
        <a href="/dashboard/student/create" class="btn btn-primary mb-3">Create New Student</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>kelas</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th width="105px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($student as $student)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $student->kelas_id }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->gender }}</td>
              <td>{{ $student->date_of_birth }}</td>
              <td>{{ $student->address }}</td>
              <td>
                <a href="/dashboard/student/{{ $student->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/student/{{ $student->id }}" method="post" class="d-inline">
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
            {data: 'id_kelas', name: 'id_kelas'},
            {data: 'name', name: 'name'},
            {data: 'gender', name: 'gender'},
            {data: 'date_of_birth', name: 'date_of_birth'},
            {data: 'address', name: 'address'},
        ]
    });
      
  });
</script>

@endsection