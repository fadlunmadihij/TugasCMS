@extends('layouts.app')
@section('content')
<form action="/kategori/{{$data->id}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <label for="exampleInpuNamaKategori" class="form-label">Edit Kategori</label>
    <input type="text" value="{{$data->nama_kategori}}" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori">
    @error('nama_kategori')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInpuFoto" class="form-label">Foto</label>
    <input type="file" value="{{$data->foto}}" class="form-control" name="foto"> <br>
    <img src="{{asset('storage/' . $data->foto)}}" width="100px" alt="">
    @error('foto')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
