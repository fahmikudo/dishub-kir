<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_kontrol');
            $table->string('no_kendaraan');
            $table->string('no_mesin');
            $table->string('no_rangka');
            $table->dateTime('tanggal_masuk');
            $table->integer('jumlah_biaya');
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
        Schema::dropIfExists('data_masuk');
    }
}
