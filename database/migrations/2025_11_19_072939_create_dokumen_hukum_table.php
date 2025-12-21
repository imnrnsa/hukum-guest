<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
      Schema::create('dokumen_hukum', function (Blueprint $table) {
    $table->id('dokumen_id');

    $table->unsignedBigInteger('jenis_id');
    $table->unsignedBigInteger('kategori_id');

    $table->string('nomor')->unique();
    $table->string('judul');
    $table->date('tanggal');
    $table->text('ringkasan')->nullable();
    $table->string('status');

    // Tambahkan kolom file
    $table->string('file_path')->nullable();

    $table->timestamps();

    $table->foreign('jenis_id')
          ->references('jenis_id')
          ->on('jenis_dokumen')
          ->onDelete('cascade');

    $table->foreign('kategori_id')
          ->references('kategori_id')
          ->on('kategori_dokumen')
          ->onDelete('cascade');
});

    }

    public function down()
    {
        Schema::dropIfExists('dokumen_hukum');
    }
};
