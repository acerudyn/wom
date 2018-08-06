<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mso extends Model
{
  protected $table = 'mso';
  protected $primarykey = 'id_mso';
  protected $fillable = ['nama_ro', 'kota_mso'];
  public $incrementing = false;
}
