<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ro extends Model
{
  protected $table = 'ro';
  protected $primarykey = 'id_ro';
  protected $fillable = ['nama_ro', 'kota_ro'];
  public $incrementing = false;
}
