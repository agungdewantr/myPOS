<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periode extends Model
{
    use HasFactory;
    protected $table = 'periode';
    protected $PrimaryKey = 'PeriodeID';
    protected $fillable = [
        'Awal', 'Akhir'
    ];
}
