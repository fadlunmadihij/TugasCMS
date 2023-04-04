<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kategori extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = ['nama_kategori', 'foto'];

    static function hapus($data)
    {
        DB::delete("delete from kategoris where ('$data')");
    }

    public function produk()
    {
        return $this->hasMany(produk::class);
    }
}
