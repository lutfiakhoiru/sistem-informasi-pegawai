<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengalaman_Pekerjaan extends Model
{
    use HasFactory;
    protected $fillable = ['NIP', 'jabatan','terhitung_mulai','selesai', 'gol_ruang_penggajian', 'gaji','s_pejabat', 's_tanggal','s_nomor'];
    protected $table = 'pengalaman_pekerjaan';
     protected $primaryKey = 'id_pekerjaan';
    public $timestamps = false;

    

    
    protected $dates = ['terhitung_mulai','selesai','s_tanggal'];
    public function getTerhitungMulaiAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTerhitungMulaiForInputAttribute()
    {
        return Carbon::parse($this->attributes['terhitung_mulai'])->format('Y-m-d');
    }
    public function getSelesaiAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getSelesaiForInputAttribute()
    {
        return Carbon::parse($this->attributes['terhitung_mulai'])->format('Y-m-d');
    }
    public function getSTanggalAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function getSTanggalForInputAttribute()
    {
        return Carbon::parse($this->attributes['s_tanggal'])->format('Y-m-d');
    }
}
