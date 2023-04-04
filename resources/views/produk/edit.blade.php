@extends('layouts.app')
@section('content')
<form action="/produk/{{$produk->id}}" method="POST" enctype="multipart/form-data">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="nama_produk" class="form-label">Nama produk</label>
    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" value="{{$produk->nama_produk}}" id="nama_produk" name="nama_produk">
    @error('nama_produk')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="harga_produk" class="form-label">Harga produk</label>
    <input type="text" class="form-control @error('harga_produk') is-invalid @enderror" value="{{$produk->harga_produk}}" id="harga_produk" name="harga_produk">
    @error('harga_produk')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" class="form-control @error('foto') is-invalid @enderror" value="{{$produk->foto}}" id="foto" name="foto"><br>
    @error('foto')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <img src="{{asset('storage/'. $produk->foto)}}" width="100px" alt="">
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" value="{{$produk->deskripsi}}" id="deskripsi" name="deskripsi">
    @error('deskripsi')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <select class="form-select" aria-label="Default select example" name="id_kategori">
    <option selected>Pilihan Kategori</option>
    @foreach ($kategori as $item)
        <option value="{{$item->id}}" {{$produk->id_kategori == $item->id ? 'selected' : ''}}>{{$item->nama_kategori}}</option>
    @endforeach
  </select><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
