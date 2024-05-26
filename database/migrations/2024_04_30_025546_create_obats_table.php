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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggalObat');
            $table->string('kodeObat');
            $table->string('namaObat');
            $table->string('jumlah');
            $table->string('satuan');
            $table->string('kondisi');
            $table->string('stokObat')->nullable();
            $table->string('expired');
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
        Schema::dropIfExists('obats');
    }
};
