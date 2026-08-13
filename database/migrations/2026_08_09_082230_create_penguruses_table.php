<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penguruses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('periodes')->cascadeOnDelete();
            $table->string('nama');
            $table->string('jabatan');        // e.g. "Ketua", "Sekretaris"
            $table->string('bidang')->nullable();  // e.g. "Bidang Pelatihan"
            $table->string('foto')->nullable();    // stored path
            $table->string('instansi')->nullable(); // rumah sakit asal
            $table->integer('urutan')->default(0); // display order
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penguruses');
    }
};
