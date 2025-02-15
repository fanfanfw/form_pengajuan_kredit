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
        Schema::create('nasabah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->string('no_ktp')->unique();
            $table->string('no_registrasi')->unique();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('nasabah');

        Schema::table('nasabah', function (Blueprint $table) {
            $table->dropColumn('no_registrasi');
        });
    }
};
