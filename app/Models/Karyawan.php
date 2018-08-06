<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
  protected $table = 'karyawan';
  protected $primarykey = 'nik_karyawan';
  protected $fillable = ['nama_karyawan', 'alamat_karyawan', 'kontak_karyawan',
  'id_ro', 'jabatan', 'flag_karyawan', 'password', 'foto'];
  public $incrementing = false;
}
