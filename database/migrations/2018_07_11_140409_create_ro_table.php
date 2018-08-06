<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ro', function (Blueprint $table) {
          $table->string('id_ro', 50);
          $table->string('nama_ro', 30);
          $table->string('kota_ro', 30);
          $table->timestamps();

          $table->primary('id_ro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ro');
    }
}
