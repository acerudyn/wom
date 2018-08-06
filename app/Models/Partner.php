<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  protected $table = 'partner';
  protected $primarykey = 'id_partner';
  protected $fillable = ['nama_partner', 'alamat_partner', 'pic_partner',
  'tlp_partner', 'kota_partner', 'npwp_partner', 'no_rekening', 'foto_partner'];
  public $incrementing = false;
}
