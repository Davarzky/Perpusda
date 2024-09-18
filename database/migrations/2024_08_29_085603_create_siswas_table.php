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
        Schema::create('siswas', function (Blueprint $table) {
            $table->integer('nis')->nullable();
            $table->string('nama' ,50)->nullable();
            $table->string('alamat' ,100)->nullable();
            $table->string('no_telp' ,13)->nullable();
            $table->string('kode_kelas' ,13)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->primary('nis');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
