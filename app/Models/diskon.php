<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diskon extends Model
{
    use HasFactory;
    protected $table = 'diskon';
    protected $PrimaryKey = 'DiskonID';
    protected $fillable = [
        'Awal', 'Akhir', 'Diskon'
    ];
}
