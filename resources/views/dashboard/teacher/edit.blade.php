@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Teacher</h1>
      </div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/teacher/{{ $teacher->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $teacher->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="gender" class="form-label">Jenis Kelamin</label>
      <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required autofocus value="{{ old('gender', $teacher->gender) }}">
      @error('gender')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
      <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" required autofocus value="{{ old('date_of_birth', $teacher->date_of_birth) }}">
      @error('date_of_birth')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="subject_taught" class="form-label">Mata Pelajaran</label>
      <input type="text" class="form-control @error('subject_taught') is-invalid @enderror" id="subject_taught" name="subject_taught" required autofocus value="{{ old('subject_taught', $teacher->subject_taught) }}">
      @error('subject_taught')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Alamat</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required autofocus value="{{ old('address', $teacher->address) }}">
      @error('address')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <!-- <div class="mb-3">
  <label for="image" class="form-label">Post Image</label>
  <input type="hidden" name="oldImage" value="{{ $teacher->image }}">
  @if($teacher->image)
    <img src="{{ asset('storage/' . $teacher->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
      <input id="stock" type="hidden" name="stock" value="{{ old('stock', $teacher->stock) }}">
      <trix-editor input="stock"></trix-editor>
    </div> -->
   <button type="submit" class="btn btn-primary">Update Teacher</button>
  </form>
</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/dashboard/teacher/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

</script>
@endsection