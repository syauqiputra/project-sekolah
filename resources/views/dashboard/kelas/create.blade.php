@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Kelas</h1>
      </div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/kelas" class="mb-5" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="id" name="id">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
   <button type="submit" class="btn btn-primary">Create Kelas</button>
  </form>
</div>

<script>
  const id = document.querySelector('#id');
  const name = document.querySelector('#name');

  id.addEventListener('change', function() {
    fetch('/dashboard/kelas/checkSlug?id=' + id.value)
    .then(response => response.json())
    .then(data => name.value = data.name)
  });

  // document.addEventListener('trix-file-accept', function(e) {
  //   e.preventDefault();
  // })

</script>
@endsection