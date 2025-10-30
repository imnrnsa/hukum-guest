<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_jenis_dokumen_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('jenis_dokumen', function (Blueprint $table) {
            $table->id('jenis_id');
            $table->string('nama_jenis', 100);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_dokumen');
    }
};