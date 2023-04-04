@extends('layouts.app')
@section('content')
<form action="{{url('/kategori/store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="exampleInpuNamaKategori" class="form-label">Tambah Kategori</label>
    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori">
    @error('nama_kategori')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInpuFoto" class="form-label">Foto</label>
    <input type="file" class="form-control" name="foto">
    @error('foto')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
