<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_dokumen_hukum_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('dokumen_hukum', function (Blueprint $table) {
            $table->id('dokumen_id');
            $table->foreignId('jenis_id')->constrained('jenis_dokumen', 'jenis_id');
            $table->foreignId('kategori_id')->constrained('kategori_dokumen', 'kategori_id');
            $table->string('nomor', 100);
            $table->string('judul');
            $table->date('tanggal');
            $table->text('ringkasan');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumen_hukum');
    }
};