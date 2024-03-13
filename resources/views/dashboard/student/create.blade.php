@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Student</h1>
      </div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/student" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
    <label for="kelas_id" class="form-label">Kelas</label>
      <select class="form-select" name="kelas_id">
        @foreach($kelas as $kelas)
        @if(old('kelas_id') == $kelas->id)
          <option value="{{ $kelas->id }}" selected>{{ $kelas->name }}</option>
        @else
          <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
        @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <textarea type="text" name="name" id="name" class="form-control mb-2" placeholder="Description" style="resize: none; height: 150px;"></textarea>
        @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">Jenis Kelamin</label>
      <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required autofocus value="{{ old('gender') }}">
      @error('gender')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
 <div class="mb-3">
      <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
      <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" required autofocus value="{{ old('date_of_birth') }}">
      @error('date_of_birth')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
 <div class="mb-3">
      <label for="address" class="form-label">Alamat</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required autofocus value="{{ old('address') }}">
      @error('address')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <input type="hidden" id="id" name="id">
    <button type="submit" class="btn btn-primary">Create Student</button>
  </form>
</div>

<script>
  const id = document.querySelector('#id'); 
  const Id_class = document.querySelector('#Id_class');

  id.addEventListener('change', function() {
    fetch('/dashboard/student/checkSlug?id=' + id.value)
    .then(response => response.json())
    .then(data => Id_class.value = data.Id_class)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

</script>
@endsection