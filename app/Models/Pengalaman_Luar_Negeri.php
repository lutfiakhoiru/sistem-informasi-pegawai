<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Pengalaman_Luar_Negeri extends Model
{
    use HasFactory;
    protected $fillable = ['NIP', 'negara','tujuan', 'lama','biaya'];
    protected $table = 'pengalaman_luar_negeri';
     protected $primaryKey = 'id_pengalaman';
    public $timestamps = false;
}
