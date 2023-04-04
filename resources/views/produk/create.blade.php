@extends('layouts.app')
@section('content')
<form action="/produk/store" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="nama_produk" class="form-label">Nama produk</label>
    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk">
    @error('nama_produk')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="harga_produk" class="form-label">Harga produk</label>
    <input type="text" class="form-control @error('harga_produk') is-invalid @enderror" id="harga_produk" name="harga_produk">
    @error('harga_produk')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
    @error('foto')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi">
    @error('deskripsi')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <select class="form-select" aria-label="Default select example" name="id_kategori">
    <option selected>Pilihan Kategori</option>
    @foreach ($data as $item)
        <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
    @endforeach
  </select><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
