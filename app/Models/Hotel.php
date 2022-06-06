<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'daftar';
    protected $fillable = ['id_kamar','nama_kamar','jenis_kamar','ukuran_kamar','jumlah_kamar','waktu_nginap','total_harga'];
}
