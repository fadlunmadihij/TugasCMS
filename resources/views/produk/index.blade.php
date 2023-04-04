@extends('layouts.app')
@section('content')
    <div class="container">
      <a href="{{ url("produk/create")}}" class="btn btn-success">Tambah produk</a><br><br>
        <table class="table table-bordered border-primary">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama produk</th>
                <th scope="col">Harga produk</th>
                <th scope="col">Foto</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <?php $l=1 ?>
          @foreach ($data as $item)
            <tbody>
              <tr>
                <td scope="row">{{$l++}}</td>
                <td>{{  $item->nama_produk }}</td>
                <td>{{  $item->harga_produk }}</td>
                <td> <img src="{{asset('storage/' . $item->foto)}}" width="100px" alt=""> </td>
                <td>{{  $item->deskripsi }}</td>
                <td>
                  <a href="/produk/{{$item->id}}" class="btn btn-primary">Hapus</a>
                  <a href="/produk/{{$item->id}}/edit" class="btn btn-danger">Edit</a>
                </td>
              </tr>
            </tbody>
          @endforeach
          </table>
    </div>
@endsection

