<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKredit extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_kredit';

    protected $fillable = [
        'nasabah_id',
        'product_id',
        'tanggal_pengajuan',
        'jaminan',
        'jumlah_pengajuan',
        'jumlah_acc',
        'status',
        'persetujuan',
    ];
    

    // Relasi: Pengajuan Kredit -> Nasabah
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
