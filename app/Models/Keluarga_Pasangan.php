<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
class Keluarga_Pasangan extends Model
{
    use HasFactory;
    protected $fillable = ['NIP', 'nama','tempat_lahir', 'tanggal_lahir','tanggal_nikah','pekerjaan','keterangan'];
    protected $table = 'keluarga_pasangan';
     protected $primaryKey = 'id_pasangan';
    public $timestamps = false;

    protected $dates = ['tanggal_lahir','tanggal_nikah'];
    public function getTanggalLahirAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalLahirForInputAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->format('Y-m-d');
    }

    public function getTanggalNikahAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTanggalNikahForInputAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_nikah'])->format('Y-m-d');
    }
}
