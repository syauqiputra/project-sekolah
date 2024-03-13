@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Study</h1>
      </div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/study/{{ $study->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
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

    <!-- <div class="mb-3">
  <label for="image" class="form-label">Post Image</label>
  <input type="hidden" name="oldImage" value="{{ $study->image }}">
  @if($study->image)
    <img src="{{ asset('storage/' . $study->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
      <input id="stock" type="hidden" name="stock" value="{{ old('stock', $study->stock) }}">
      <trix-editor input="stock"></trix-editor>
    </div> -->
   <button type="submit" class="btn btn-primary">Update Study</button>
  </form>
</div>

<script>
  const name_size = document.querySelector('#name_size');
  const slug = document.querySelector('#slug');

  name_size.addEventListener('change', function() {
    fetch('/dashboard/study/checkSlug?name_size=' + name_size.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection