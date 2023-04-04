@extends('layouts.app')
@section('content')
    <div class="container">
      <a href="{{ url("kategori/create")}}" class="btn btn-success">Tambah Kategori</a><br><br>
        <table class="table table-bordered border-primary"> 
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <?php $l=1 ?>
          @foreach ($data as $item)
            <tbody>
              <tr>
                <td scope="row">{{$l++}}</td>
                <td>{{  $item->nama_kategori }}</td>
                <td> <img src="{{asset('storage/' . $item->foto)}}" width="100px" alt=""></td>
                <td>
                  <a href="/kategori/{{$item->id}}" class="btn btn-primary">Hapus</a>
                  <a href="/kategori/{{$item->id}}/edit" class="btn btn-danger">Edit</a>
                </td>
              </tr>
            </tbody>
          @endforeach
          </table>
    </div>
@endsection

