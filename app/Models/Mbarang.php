<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbarang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $PrimaryKey = 'BarangID';
    protected $fillable = [
        'DiskonID','NamaBarang','Harga','Stok','Profit','Kode'
    ];
}
