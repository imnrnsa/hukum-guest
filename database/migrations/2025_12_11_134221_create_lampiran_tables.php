<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tabel Dokumen
        Schema::create('lampiran_dokumen', function (Blueprint $table) {
            $table->id('lampiran_id');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // Tabel File Lampiran
        Schema::create('lampiran_files', function (Blueprint $table) {
            $table->id('file_id');
            $table->unsignedBigInteger('lampiran_id');
            $table->string('file_path'); 
            $table->string('file_type'); 
            $table->timestamps();

            $table->foreign('lampiran_id')
                  ->references('lampiran_id')
                  ->on('lampiran_dokumen')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lampiran_files');
        Schema::dropIfExists('lampiran_dokumen');
    }
};
