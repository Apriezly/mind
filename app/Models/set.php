<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class set extends Model
{
    use HasFactory;
    protected $table ="set";
    protected $fillable = [
        'nama'
    ];

    public function pengingat(){
        return $this->hasMany(Pengingat::class);
    }
}
