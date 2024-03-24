<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualandetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'detail_id',
        'penjualan_id',
        'produk_id',
        'jumlah_produk',
        'subtotal',
    ];
    public function produk()
    {
        return $this->belongsTo('App\Models\Produk', 'produk_id', 'id');
    }
    public function penjualan()
    {
        return $this->belongsTo('App\Models\Penjualan', 'penjualan_id', 'id');
    }
}
