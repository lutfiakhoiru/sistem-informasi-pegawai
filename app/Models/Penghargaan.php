<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Penghargaan extends Model
{
    use HasFactory;
    protected $fillable = ['NIP', 'nama','tahun', 'instansi'];
    protected $table = 'penghargaan';
     protected $primaryKey = 'id_penghargaan';
    public $timestamps = false;

}
