<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan_barang extends Model
{
    use HasFactory;
    protected $table = 'penjualan_barang';
    protected $PrimaryKey = 'pjbID';
    protected $fillable = [
        'PenjualanID', 'BarangID', 'Satuan', 'Qty', 'Harga', 'Total'
    ];
}
