<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jenis_dokumen', function (Blueprint $table) {
            $table->id('jenis_id');       // ← ini penting!
            $table->string('nama_jenis')->unique();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_dokumen'); // ← perbaiki nama tabel
    }
};
