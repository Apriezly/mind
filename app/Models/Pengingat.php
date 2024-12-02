<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengingat extends Model
{
    use HasFactory;
    protected $table ="pengingat";
    protected $fillable = [
        'document_id',
        'set',
        'set_custom'
    ];

    public function dokumen(){
        return $this->belongsTo(Dokumen::class);
    }

    public function set(){
        return $this->belongsTo(Set::class);
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
}
