<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Keluarga_Anak extends Model
{
    use HasFactory;

    protected $fillable = ['NIP','nama','jenis_kelamin','tempat_lahir','tanggal_lahir','pekerjaan','keterangan'];
    protected $table = 'keluarga_anak';
     protected $primaryKey = 'id_anak';
    public $timestamps = false;

    protected $dates = ['tanggal_lahir'];
    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalLahirForInputAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->format('Y-m-d');
    }
}
