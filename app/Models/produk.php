<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class produk extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'harga_produk', 'foto', 'deskripsi', 'id_kategori'];

    // static function hapus($data)
    // {
    //     DB::delete("delete from produks where ('$data')");
    // }

    static function hapusproduk($data)
    {
        DB::delete("delete from produks where id='$data'");
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
