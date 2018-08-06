<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
          $table->string('id_invoice', 50);
          $table->string('id_partner', 50);
          $table->string('nama_partner', 30);
          $table->text('alamat_partner');
          $table->string('pic_partner', 20);
          $table->string('tlp_partner', 15);
          $table->string('kota_partner', 30);
          $table->string('npwp_partner', 15);
          $table->string('no_rekening', 20);
          $table->double('subtotal', 20);
          $table->double('ppn', 20);
          $table->dateTime('tgl_invoice');
          $table->string('nik_karyawan', 20);
          $table->dateTime('duedate_invoice');
          $table->timestamps();

          $table->primary('id_invoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
