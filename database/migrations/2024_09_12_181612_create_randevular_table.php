<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRandevularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('randevular', function (Blueprint $table) {
            $table->id(); // Bu, otomatik olarak unsignedBigInteger olarak tanımlanır.
            $table->date('tarih');
            $table->time('saat');
            $table->unsignedBigInteger('musteri_id');
            $table->unsignedBigInteger('hizmet_id');
            $table->foreign('musteri_id')->references('id')->on('musteriler')->onDelete('cascade');
            $table->foreign('hizmet_id')->references('id')->on('hizmetler')->onDelete('cascade');
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
        Schema::dropIfExists('randevular');
    }
}
