@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Study</h1>
</div>

<div class="container">
    <h1>Data Study</h1>
        <a href="/dashboard/study/create" class="btn btn-primary mb-3">Create New Study</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Guru</th>
                <th>Kelas</th>
                <th width="105px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($study as $study)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $study->teacher->name ?? ""}}</td>
              <td>{{ $study->kelas->name ?? ""}}</td>
              <td>
                <a href="/dashboard/study/{{ $study->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/study/{{ $study->id }}" method="post" class="d-inline">
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
            {data: 'id_teacher', name: 'id_teacher'},
            {data: 'id_kelas', name: 'id_kelas'},
        ]
    });
      
  });
</script>

@endsection