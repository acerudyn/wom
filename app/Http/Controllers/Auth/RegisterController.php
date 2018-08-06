<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_karyawan'   => 'required|min:3|max:50',
            'alamat_karyawan' => 'required|min:3|max:50',
            'kontak_karyawan' => 'required|min:3|max:20',
            'nama_ro'         => 'required|min:3|max:50',
            'jabatan'         => 'required|min:3|max:50',
            'flag_karyawan'   => 'required|min:3|max:50',
            'password'        => 'required|min:3|max:50',
            'foto'            => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $id_karyawan  = uniqid();
        $nik_karyawan = date('Y.m.00').rand(10, 100);
        $fileName     = 'null';
        if (Input::file('foto')->isValid()) {
        $destinationPath = public_path('image');
        $extension       = Input::file('foto')->getClientOriginalExtension();
        $fileName        = $id_karyawan.'.'.$extension;
        Input::file('foto')->move($destinationPath, $fileName);
        }

        return User::create([
            'id'              => $id_karyawan,
            'nik_karyawan'    => $nik_karyawan,
            'nama_karyawan'   => $data['nama_karyawan'],
            'alamat_karyawan' => $data['alamat_karyawan'],
            'kontak_karyawan' => $data['kontak_karyawan'],
            'nama_ro'         => $data['nama_ro'],
            'jabatan'         => $data['jabatan'],
            'flag_karyawan'   => $data['flag_karyawan'],
            'password'        => bcrypt($data['password']),
            'foto'            => $fileName,
        ]);
    }
}
