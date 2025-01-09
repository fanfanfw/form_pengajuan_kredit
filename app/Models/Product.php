<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];
    // Relasi: Product -> Pengajuan Kredit
    public function pengajuanKredit()
    {
        return $this->hasMany(PengajuanKredit::class);
    }
}
