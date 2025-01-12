<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengajuan_kredit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nasabah_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('nasabah_id')->references('id')->on('nasabah')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->date('tanggal_pengajuan');
            $table->string('jaminan');
            $table->decimal('jumlah_pengajuan', 15, 2);
            $table->decimal('jumlah_acc', 15, 2)->nullable();
            $table->string('status')->default('pending'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajuan_kredit');
    }
};
