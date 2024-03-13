@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Student</h1>
      </div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/study" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="id_kelas" class="form-label">Kelas</label>
      <select class="form-select" name="id_kelas">
        @foreach($kelas as $kelas)
        @if(old('id_kelas') == $kelas->id)
          <option value="{{ $kelas->id }}" selected>{{ $kelas->name }}</option>
        @else
          <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
        @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
    <label for="id_teacher" class="form-label">Guru</label>
      <select class="form-select" name="id_teacher">
        @foreach($teacher as $teacher)
        @if(old('id_teacher') == $teacher->id)
          <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
        @else
          <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
        @endif
        @endforeach
      </select>
    </div>
    
    <input type="hidden" id="id" name="id">
    <button type="submit" class="btn btn-primary">Create Study</button>
  </form>
</div>

<script>
  const id = document.querySelector('#id'); 
  const Id_class = document.querySelector('#Id_class');

  id.addEventListener('change', function() {
    fetch('/dashboard/study/checkSlug?id=' + id.value)
    .then(response => response.json())
    .then(data => Id_class.value = data.Id_class)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

</script>
@endsection