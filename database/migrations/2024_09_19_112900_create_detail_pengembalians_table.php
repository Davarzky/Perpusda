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
        Schema::create('detail_pengembalians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengembalian');
            $table->string('kode_buku');
            $table->integer('jumlah');
            $table->foreign('id_pengembalian')->references('id')->on('pengembalians');
            $table->foreign('kode_buku')->references('kode_buku')->on('bukus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengembalians');
    }
};
