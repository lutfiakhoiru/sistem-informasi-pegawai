<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $fillable = ['NIP', 'jenjang', 'nama_pendidikan', 'jurusan', 'sttb','tempat','nama_dekan'];
    protected $table = 'pendidikan';
    protected $primaryKey = 'id_pendidikan';
    public $timestamps = false;
}
