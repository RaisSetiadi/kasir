<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
    ];
    public function Penjualandetail()
    {
        return $this->hasMany('App\Models\Penjualandetail', 'produk_id', 'id');
    }
}
