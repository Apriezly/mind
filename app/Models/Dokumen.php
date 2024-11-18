<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;


    protected $table ="dokumen";
    protected $fillable = [
        'kegiatan',
        'deskripsi',
        'expiration_date',
        'kategori_id',
        'image',
        'set',
        'tipe',
        'ulangi',
        'imageasli',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function pengingat(){
        return $this->belongsTo(Pengingat::class);
    }

    // public function user(){
    //     return $this->hasMany(User::class);
    // }
}
