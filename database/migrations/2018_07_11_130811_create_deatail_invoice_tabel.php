<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeatailInvoiceTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_invoice', function (Blueprint $table) {
            $table->string('id_invoice', 50);
            $table->string('id_spk', 50);
            $table->string('no_spk', 50);
            $table->timestamp('tgl_spk');
            $table->dateTime('tgl_pengerjaan');
            $table->dateTime('tgl_duedate_spk');
            $table->string('tid', 10);
            $table->string('mid', 10);
            $table->string('jenis_spk', 15);
            $table->string('status_pengerjaan', 15);
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
        Schema::dropIfExists('detail_invoice');
    }
}
