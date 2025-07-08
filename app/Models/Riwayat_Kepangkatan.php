<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
class Riwayat_Kepangkatan extends Model
{
    use HasFactory;
    protected $fillable = ['NIP', 'pangkat', 'gol_ruang_penggajian', 'terhitung_mulai','gaji','s_pejabat', 's_tanggal','s_nomor','keterangan'];
    protected $table = 'riwayat_kepangkatan';
     protected $primaryKey = 'id_kepangkatan';
    public $timestamps = false;
 
    protected $dates = ['terhitung_mulai','s_tanggal'];
    public function getTerhitungMulaiAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTerhitungMulaiForInputAttribute()
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
