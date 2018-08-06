<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner', function (Blueprint $table) {
          $table->string('id_partner', 50);
          $table->string('nama_partner', 50);
          $table->text('alamat_partner');
          $table->string('pic_partner', 20);
          $table->string('tlp_partner', 15);
          $table->string('kota_partner', 30);
          $table->string('npwp_partner', 15);
          $table->string('no_rekening', 15);
          $table->text('foto_partner');
          $table->timestamps();

          $table->primary('id_partner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner');
    }
}
