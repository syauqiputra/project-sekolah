@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Student</h1>
      </div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/student/{{ $student->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
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
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $student->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">Jenis Kelamin</label>
      <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required autofocus value="{{ old('gender', $student->gender) }}">
      @error('gender')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
      <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" required autofocus value="{{ old('date_of_birth', $student->date_of_birth) }}">
      @error('date_of_birth')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Alamat</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required autofocus value="{{ old('address', $student->address) }}">
      @error('address')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <!-- <div class="mb-3">
  <label for="image" class="form-label">Post Image</label>
  <input type="hidden" name="oldImage" value="{{ $student->image }}">
  @if($student->image)
    <img src="{{ asset('storage/' . $student->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
  @else
    <img class="img-preview img-fluid mb-3 col-sm-5">
  @endif
    <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name=" image" onchange="previewImage()">
  @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>                             -->

    <!-- <div class="mb-3">
      <label for="stock" class="form-label">Desc</label>
      @error('stock')
        <p class="text-danger">{{ $message }}</p>
      @enderror  
      <input id="stock" type="hidden" name="stock" value="{{ old('stock', $student->stock) }}">
      <trix-editor input="stock"></trix-editor>
    </div> -->
   <button type="submit" class="btn btn-primary">Update Student</button>
  </form>
</div>

<script>
  const id_class = document.querySelector('#id_class');
  const slug = document.querySelector('#slug');

  id_class.addEventListener('change', function() {
    fetch('/dashboard/student/checkSlug?id_class=' + id_class.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

</script>
@endsection