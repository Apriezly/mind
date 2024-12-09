<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relasi extends Model
{
    use HasFactory;
    protected $table ="relasi";
    protected $fillable = [
        'document_id',
        'set_id'
    ];
    
}
