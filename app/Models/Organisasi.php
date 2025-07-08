<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Organisasi extends Model
{
     use HasFactory;
    protected $fillable = ['NIP','nama_organisasi','kedudukan','tahun','tempat','nama_pimpinan'];
    protected $table = 'organisasi';
     protected $primaryKey = 'id_organisasi';
    public $timestamps = false;
}
