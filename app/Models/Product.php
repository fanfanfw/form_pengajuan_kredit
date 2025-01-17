<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'kategori'];
    protected $table = 'products';

    public function pengajuanKredit()
{
    return $this->hasMany(PengajuanKredit::class, 'product_id');
}

}
