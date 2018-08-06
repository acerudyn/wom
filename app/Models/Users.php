<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  protected $table = 'users';
  protected $primarykey = 'id';
  protected $fillable = ['nik_karyawan','nama_karyawan', 'alamat_karyawan', 'kontak_karyawan',
  'nama_ro', 'jabatan', 'flag_karyawan', 'password', 'foto'];
  public $incrementing = false;
}
