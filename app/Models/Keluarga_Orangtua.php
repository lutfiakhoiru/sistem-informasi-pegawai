<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Keluarga_Orangtua extends Model
{
     use HasFactory;
    protected $fillable = ['NIP','nama','status','tanggal_lahir','pekerjaan','keterangan'];
    protected $table = 'keluarga_orangtua';
     protected $primaryKey = 'id_orangtua';
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
