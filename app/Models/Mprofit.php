<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mprofit extends Model
{
    use HasFactory;
    protected $table = 'profit';
    protected $PrimaryKey = 'ProfitID';
    protected $fillable = [
        'Profit'
    ];
}
