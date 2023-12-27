<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaidah extends Model
{
    use HasFactory;

    protected $table = 'table_kaidah';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no',
        'kaidah_aturan'
    ];
}
