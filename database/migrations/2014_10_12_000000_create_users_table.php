<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 50);
            $table->string('nik_karyawan', 50);
            $table->string('nama_karyawan', 50);
            $table->text('alamat_karyawan');
            $table->string('kontak_karyawan', 15);
            $table->string('nama_ro', 50);
            $table->string('jabatan', 30);
            $table->string('flag_karyawan', 15);
            $table->text('password');
            $table->text('foto');

            $table->rememberToken();
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
