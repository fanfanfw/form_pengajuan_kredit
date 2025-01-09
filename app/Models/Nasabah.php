<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';
    protected $fillable = ['no_registrasi', 'nama', 'alamat', 'no_telepon', 'no_ktp', 'image'];

    // Relasi: Nasabah -> Pengajuan Kredit
    public function pengajuanKredit()
    {
        return $this->hasMany(PengajuanKredit::class);
    }
}
