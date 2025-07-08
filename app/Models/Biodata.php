<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
class Biodata extends Model
{
    use HasFactory;
    protected $fillable = ['NIK','NIP','nama','jenis_kelamin','tempat_lahir','tanggal_lahir','status','agama','hobi','jalan','desa','kecamatan','kabupaten','provinsi','pangkat','status_pegawai','jabatan','masa_kerja','no_karpeg','no_rek','bpjs','npwp','tinggi_badan','berat_badan','rambut','bentuk_muka','warna_kulit','ciri_khas','cacat','gol_darah','foto'];
    protected $table = 'Biodata';
    protected $primaryKey = 'NIP';
    public $incrementing = false;
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
