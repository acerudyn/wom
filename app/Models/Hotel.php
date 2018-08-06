<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  protected $table = 'hotel';
  protected $primarykey = 'id';
  protected $fillable = ['nama_hotel', 'alamat', 'telefon', 'harga', 'fasilitas', 'maps', 'foto_hotel'];
  public $incrementing = false;
}
