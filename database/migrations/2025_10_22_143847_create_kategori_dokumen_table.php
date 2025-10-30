<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_kategori_dokumen_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kategori_dokumen', function (Blueprint $table) {
            $table->id('kategori_id');
            $table->string('nama', 100);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_dokumen');
    }
};