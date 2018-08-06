<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
          $table->string('nik_karyawan', 50);
          $table->string('nama_karyawan', 50);
          $table->text('alamat_karyawan');
          $table->string('kontak_karyawan', 15);
          $table->string('nama_ro', 50);
          $table->string('jabatan', 30);
          $table->string('flag_karyawan', 15);
          $table->string('password', 50);
          $table->text('foto');
          $table->timestamps();

          $table->primary('nik_karyawan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
