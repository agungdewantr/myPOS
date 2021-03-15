<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian_barang extends Model
{
    use HasFactory;
    protected $table = 'pembelian_barang';
    protected $PrimaryKey = 'pbbID';
    protected $fillable = ['PembelianID','BarangID','Harga','Qty1','Qty2','Profit','Total'];
}
