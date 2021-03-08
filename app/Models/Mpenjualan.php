<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpenjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $PrimaryKey = 'PenjualanID';

    protected $fillable = [
        'totalTransaksi', 'jmlPembayaran'
    ];
}
