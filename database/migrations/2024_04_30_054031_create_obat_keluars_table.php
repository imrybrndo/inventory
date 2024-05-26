<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_keluars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggalObat');
            $table->string('kodeObat');
            $table->string('namaObat');
            $table->string('stokObat');
            $table->string('obatKeluar');
            $table->string('satuan');
            $table->string('sisaObat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat_keluars');
    }
};
