<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_c1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tps_id')->constrained('tps')->onDelete('cascade');
            $table->foreignId('saksi_id')->constrained('saksi')->onDelete('cascade');
            $table->integer('jumlah_suara');
            $table->integer('jumlah_suara_sah');
            $table->integer('jumlah_suara_tidak_sah');
            $table->integer('jumlah_suara_sah_partai');
            $table->string('file_c1')->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_c1');
    }
};
