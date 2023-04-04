<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index() {
        $data = kategori::all();
        return view('kategori/index',compact(['data']));
    }

    public function create()
    {
        return view('kategori/create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validasi = $request->validate([
            'nama_kategori' => 'required|min:2',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('foto')) {
                $validasi['foto'] = $request->file('foto')->store('gambar');
        }
        Kategori::create($validasi);
        return redirect('/kategori');
    }

    public function edit($id)
    {
        $data = kategori::find($id);
        return view('kategori.edit', compact(['data']));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|min:2',
            'foto' => [File::types(['jpg', 'jpeg', 'png', 'gif'])->max(2 * 1024)],
        ]);

        $data = kategori::find($id);
        $data->nama_kategori = $request->nama_kategori;
        if ($request->file('foto')) {
            Storage::delete($data->foto);
            $data->foto = Storage::putFile('gambar', $request->file('foto'));
        }
        $data->save();
        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $data = kategori::hapus($id);
        // $data->delete();
        return redirect('/kategori');
    }
}