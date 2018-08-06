<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
  protected $table = 'spk';
  protected $primarykey = 'id_spk';
  protected $fillable = ['no_spk', 'tgl_spk', 'tgl_pengerjaan', 'tgl_duedate_spk',
  'tid', 'mid', 'nama_merchant', 'alamat_merchant', 'pic_merchant', 'kontak_merchant',
  'jenis_spk', 'perintah_spk','foto_1', 'foto_2', 'status_spk', 'status_pengerjaan',
  'jenis_edc', 'sn_edc', 'tipe_komunikasi', 'provider', 'nmr_simcard', 'sn_simcard',
  'adaptor', 'edc', 'stiker', 'nama_sesuai_lokasi', 'alamat_sesuai_lokasi', 'tid_mid_sesuai',
  'test_debit', 'test_kredit', 'test_prepaid', 'thermal_awal', 'thermal_drop', 'thermal_akhir',
  'keterangan_spk', 'nik_karyawan', 'nama_mso', 'id_ro', 'nama_ro', 'kota_mso', 'id_partner',
  'status_invoicing', 'id_invoice'];
  public $incrementing = false;
}
