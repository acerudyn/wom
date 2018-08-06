<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailInvoice extends Model
{
  protected $table = 'detail_invoice';
  //protected $primarykey = 'id_invoice';
  protected $fillable = ['id_spk', 'no_spk', 'tgl_spk', 'tgl_pengerjaan',
  'tgl_duedate_spk', 'tid', 'mid', 'jenis_spk', 'status_pengerjaan'];
  public $incrementing = false;
}
