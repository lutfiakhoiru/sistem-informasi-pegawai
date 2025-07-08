<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable
{
    use Notifiable;

    protected $guard = 'pegawai';
    protected $table = 'pegawai';
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nama',
        'nip',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tell Laravel to use 'nip' for authentication instead of 'email'
    public function getAuthIdentifierName()
    {
        return 'nip';
    }
    // public function biodata()
    // {
    //     return $this->belongsTo(Biodata::class, 'nip', 'nip');
    // }
    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'nip', 'nip');
    }
    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'NIP', 'nip');
    }
     public function kursus()
    {
        return $this->hasMany(Kursus::class, 'NIP', 'nip');
    }
}
