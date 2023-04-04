<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index() {
        $data = produk::all();
        return view('produk/index',compact(['data']));
    }

    public function create()
    {
        $data = kategori::all();
        return view('produk/create', compact(['data']));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validasi = $request->validate([
            'nama_produk' => 'required|min:2',
            'harga_produk' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|min:2',
            'id_kategori' => ''
        ]);

        // dd($validasi);
        if ($request->file('foto')) {
                $validasi['foto'] = $request->file('foto')->store('gambar');
        }
        $data = produk::create($validasi);
        return redirect('/produk');
    }

    public function edit($id)
    {
        $data['kategori'] = kategori::all();
        $data['produk'] = produk::find($id);
        return view('/produk/edit', $data);
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'nama_produk' => 'required|min:2',
            'harga_produk' => 'required|min:2',
            'foto' => [File::types(['jpg', 'jpeg', 'png', 'gif'])->max(2 * 1024)],
            'deskripsi' => 'required|min:2',
            'id_kategori' => ''
        ]);
        
        $data = produk::find($id);
        $data->nama_produk = $request->nama_produk;
        if ($request->file('foto')) {
            Storage::delete($data->foto);
            $data->foto = Storage::putFile('gambar', $request->file('foto'));
        }
        $data->save();
        return redirect('/produk');
    }

    public function destroy($id)
    {
        $data = produk::hapusproduk($id);
        // $data->delete();
        return redirect('/produk');
    }


}
