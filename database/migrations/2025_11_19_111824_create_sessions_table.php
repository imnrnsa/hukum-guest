<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            // PRIMARY KEY
            $table->string('id')->primary();

            // USER ID (boleh null)
            $table->foreignId('user_id')
                ->nullable()
                ->index()
                ->constrained('users')
                ->onDelete('cascade'); // jika user dihapus, session ikut hilang

            // INFO CLIENT
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            // SESSION PAYLOAD
            $table->longText('payload'); // Laravel biasanya longText

            // LAST ACTIVITY
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
