<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pengingat extends Model
{
    use HasFactory;
    protected $table ="pengingat";
    protected $fillable = [
        'document_id',
        'set_id',
        'set_custom',
    ];

    // protected $casts = [
    //     'set_id' => 'array',
    // ];

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
