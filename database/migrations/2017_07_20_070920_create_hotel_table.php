<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.s
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->string('id', 50);
            $table->string('nama_hotel', 50);
            $table->string('alamat', 50);
            $table->string('telefon', 20);
            $table->string('harga', 20);
            $table->text('fasilitas');
            $table->text('maps');
            $table->text('foto_hotel');
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
        Schema::dropIfExists('hotel');
    }
}
