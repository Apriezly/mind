<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ="user";
    protected $primaryKey = "id";
    
    protected $fillable = [
        'name',
        'email',
        'nomor',
        'password',
        'ulangi_password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'ulangi_password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'nomor_verified_at' => 'datetime',
    ];

    // public function dokumen(){
    //     return $this->hasMany(Dokumen::class);
    // }

    // public function kategori(){
    //     return $this->hasMany(Kategori::class);
    // }
}
