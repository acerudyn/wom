<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spk', function (Blueprint $table) {
          $table->string('id_spk', 50);
          $table->string('no_spk', 50);
          $table->dateTime('tgl_spk');
          $table->timestamp('tgl_pengerjaan')->nullable()->default(null);
          $table->timestamp('tgl_duedate_spk')->nullable()->default(null);
          $table->string('tid', 20);
          $table->string('mid', 20);
          $table->string('nama_merchant', 30);
          $table->text('alamat_merchant');
          $table->string('pic_merchant', 20);
          $table->string('kontak_merchant', 20);
          $table->string('jenis_spk', 30);
          $table->text('perintah_spk');
          $table->text('foto_1');
          $table->text('foto_2');
          $table->string('status_spk', 30);
          $table->string('status_pengerjaan', 30);
          $table->string('jenis_edc', 20);
          $table->string('sn_edc',30);
          $table->string('tipe_komunikasi',10);
          $table->string('provider',15);
          $table->string('nmr_simcard',20);
          $table->string('sn_simcard',30);
          $table->string('adaptor',10);
          $table->string('edc',10);
          $table->string('stiker',10);
          $table->string('nama_sesuai_lokasi',10);
          $table->string('alamat_sesuai_lokasi',10);
          $table->string('tid_mid_sesuai',10);
          $table->string('test_debit',10);
          $table->string('test_kredit',10);
          $table->string('test_prepaid',10);
          $table->string('thermal_awal',10);
          $table->string('thermal_drop',10);
          $table->string('thermal_akhir',10);
          $table->text('keterangan_spk');
          $table->string('nik_karyawan',50);
          $table->string('nama_mso',30);
          $table->string('id_ro',50);
          $table->string('nama_ro',30);
          $table->string('kota_mso',30);
          $table->string('id_partner',50);
          $table->string('status_invoicing',20);
          $table->string('id_invoice',50);
          $table->timestamps();

          $table->primary('id_spk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spk');
    }
}
