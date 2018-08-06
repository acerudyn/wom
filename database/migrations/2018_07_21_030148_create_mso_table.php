<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mso', function (Blueprint $table) {
          $table->string('id_mso', 50);
          $table->string('nama_ro', 50);
          $table->string('kota_mso', 50);
          $table->timestamps();

          $table->primary('id_mso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mso');
    }
}
