<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $table = 'invoice';
  protected $primarykey = 'id_invoice';
  protected $fillable = ['id_partner', 'nama_partner', 'alamat_partner', 'pic_partner',
  'tlp_partner', 'kota_partner', 'npwp_partner', 'no_rekening', 'subtotal', 'ppn',
  'nik_karyawan', 'duedate_invoice'];
  public $incrementing = false;
}
