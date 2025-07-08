<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Keluarga_Saudara extends Model
{
    use HasFactory;
    protected $fillable = ['NIP','nama','jenis_kelamin','tanggal_lahir','pekerjaan','keterangan'];
    protected $table = 'keluarga_saudara';
     protected $primaryKey = 'id_saudara';
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
