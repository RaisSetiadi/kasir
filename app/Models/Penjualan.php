<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'penjualan_id',
        'tanggal_penjualan',
        'total_harga'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function penjualandetail()
    {
        return $this->hasMany('App\Models\Penjualandetail', 'penjualan_id', 'id');
    }
}
