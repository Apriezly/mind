<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dokumen extends Model
{
    use HasFactory;


    protected $table ="dokumen";
    protected $fillable = [
        'user_id',
        'kegiatan',
        'deskripsi',
        'expiration_date',
        'kategori_id',
        'image',
        'tipe',
        'imageasli',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function set(){
        return $this->belongsTo(Set::class);
    }

    public function pengingat(){
        return $this->belongsTo(Pengingat::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
