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
        Schema::create('detail_form_c1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_c1_id')->constrained('form_c1')->onDelete('cascade');
            $table->foreignId('calon_id')->constrained('calon');
            $table->integer('jumlah_suara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_form_c1');
    }
};
