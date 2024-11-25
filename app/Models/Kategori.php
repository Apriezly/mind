<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table ="kategori";
    protected $fillable = [
        'user_id',
        'image',
        'judul'
    ];
   

    public function dokumen(){
        return $this->hasMany(Dokumen::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
