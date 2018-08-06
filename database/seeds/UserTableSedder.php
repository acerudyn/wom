<?php

use Illuminate\Database\Seeder;

class UserTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Karyawan::insert([
          [
            'nama_karyawan'   => 'mobil',
            'alamat_karyawan' => 'roda empat',
            'kontak_karyawan' => 'jepang',
            'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
          ],
      ]);
    }
}
