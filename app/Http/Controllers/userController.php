<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Users;
use Auth;

class userController extends Controller
{

/*
  public function __construct()     // make akses this must login first
    {
        $this->middleware('auth');
    }
*/

  public function index()
    {
        $datas   = Users::get();
        $id_user = Auth::user()->id;
        return view('admin/showUser')->with(compact('datas','id_user'));
    }

  public function profil($id)
    {
      $tampil = Users::find($id);
      return view('admin/showProfil')->with('tampil', $tampil);
    }

 public function view($id)
   {
     $tampil = Users::find($id);
     return view('admin/viewUser')->with('tampil', $tampil);
   }

  public function edit($id)
    {
        $tampiledit = Users::where('id', $id)->first();
        return view('admin/showProfil')->with('tampiledit', $tampiledit);
    }

  public function editByAdmin($id)
    {
        $tampiledit = Users::where('id', $id)->first();
        $nama_ro    = DB::table('ro')->where('kota_ro', $tampiledit->nama_ro)->first();
        $datas_ro   = DB::table('ro')->get();
        return view('admin/editUser')->with(compact('tampiledit','nama_ro','datas_ro'));
    }

  public function update(Request $request, $id)
    {
        $update = Users::where('id', $id)->first();
        $gambar = $request->file('foto');

        if ( empty($gambar) ) {

              $update->nama_karyawan   = $request['nama_karyawan'];
              $update->alamat_karyawan = $request['alamat_karyawan'];
              $update->kontak_karyawan = $request['kontak_karyawan'];
              $update->password        = bcrypt($request['password']);
              $update->update();

              flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
              return redirect()->to('/dashboard');

        } else { // if empty value request file image

              $gambar = $request->file('foto');

              $gambarName = $update->foto;              // delete old image and change new image
              unlink(public_path('image/'.$gambarName));

              $fileName   = $update->id.'_update.'.$gambar->getClientOriginalExtension(); // modified filename for anticipation same file name
              $request->file('foto')->move("image/", $fileName);

              $update->nama_karyawan   = $request['nama_karyawan'];
              $update->alamat_karyawan = $request['alamat_karyawan'];
              $update->kontak_karyawan = $request['kontak_karyawan'];
              $update->password        = bcrypt($request['password']);
              $update->foto           = $fileName;
              $update->update();

              flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
              return redirect()->to('/dashboard');

        }
    }

    public function updateByAdmin(Request $request, $id)
      {
          $update = Users::where('id', $id)->first();
          $gambar = $request->file('foto');

          if ( empty($gambar) ) {

                $update->nama_karyawan   = $request['nama_karyawan'];
                $update->alamat_karyawan = $request['alamat_karyawan'];
                $update->kontak_karyawan = $request['kontak_karyawan'];
                $update->nama_ro         = $request['nama_ro'];
                $update->jabatan         = $request['jabatan'];
                $update->flag_karyawan   = $request['jabatan'];
                $update->update();

                flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
                return redirect()->to('/showUser');

          } else { // if empty value request file image

                $gambar = $request->file('foto');

                $gambarName = $update->foto;              // delete old image and change new image
                unlink(public_path('image/'.$gambarName));

                $fileName   = $update->id.'_update.'.$gambar->getClientOriginalExtension(); // modified filename for anticipation same file name
                $request->file('foto')->move("image/", $fileName);

                $update->nama_karyawan   = $request['nama_karyawan'];
                $update->alamat_karyawan = $request['alamat_karyawan'];
                $update->kontak_karyawan = $request['kontak_karyawan'];
                $update->nama_ro         = $request['nama_ro'];
                $update->jabatan         = $request['jabatan'];
                $update->flag_karyawan   = $request['jabatan'];
                $update->foto            = $fileName;
                $update->update();

                flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
                return redirect()->to('/showUser');

          }
      }

  public function create()
    {
      $datas_ro = DB::table('ro')->get();
      return view('admin/addUser')->with(compact('datas_ro'));
    }

  public function store(Request $request)
    {

        $this->validate($request, [
          'nama_karyawan'   => 'required|min:3|max:255',
          'alamat_karyawan' => 'required|min:3|max:255|',
          'kontak_karyawan' => 'required|min:3|max:20',
          'nama_ro'         => 'required|min:3|max:50',
          'jabatan'         => 'required|min:3|max:50',
          'password'        => 'required|min:3|confirmed',
          'foto'            => 'required',
        ]);

        $id_karyawan  = uniqid();
        $nik_karyawan = date('Y.m.00').rand(10, 100);

         $tambah       = new Users();
         $tambah->id   = $id_karyawan;
         $tambah->nik_karyawan    = $nik_karyawan;
         $tambah->nama_karyawan   = $request->nama_karyawan;
         $tambah->alamat_karyawan = $request->alamat_karyawan;
         $tambah->kontak_karyawan = $request->kontak_karyawan;
         $tambah->nama_ro  = $request->nama_ro;
         $tambah->jabatan  = $request->jabatan;
         $tambah->flag_karyawan  = $request->jabatan;
         $tambah->password = bcrypt($request->password);


         $gambar       = $request->file('foto');
         $fileGambar   = $id_karyawan.'.'.$gambar->getClientOriginalExtension(); // modified filename for anticipation same file name
         $request->file('foto')->move("image/", $fileGambar);
         $tambah->foto = $fileGambar;
         $tambah->save();
         //dd($tambah);

         flash()->success('Succsess', 'Wow Good Job, Succsess Submit Data !');
         return redirect('/showUser');
    }

  public function destroy($id)
    {
        $hapus = Users::find($id);
        $fotoGambar= $hapus->foto;
        unlink(public_path('image/'.$fotoGambar));
        $hapus->delete();

        flash()->overlay('Succsess', 'Wow Good Job, Succsess Deleted Data !');
        return redirect('/showUser');
    }
}
