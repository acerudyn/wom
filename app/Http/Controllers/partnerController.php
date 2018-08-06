<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Http\Requests;
use Uuid;

class partnerController extends Controller
{
  public function __construct()     // make akses this must login first
    {
        $this->middleware('auth');
    }

  public function index()
    {
        $datas = Partner::get();
        return view('admin/showPartner')->with('datas', $datas);
    }

  public function view($id)
    {
      $tampil = Partner::where('id_partner', $id)->first();
      return view('admin/viewPartner')->with('tampil', $tampil);
    }

  public function edit($id)
    {
        $tampiledit = Partner::where('id_partner', $id)->first();
        return view('admin/editPartner')->with('tampiledit', $tampiledit);
    }

  public function update(Request $request, $id)
    {

      $update = Partner::where('id_partner', $id)->first();
      $gambar = $request->file('foto_partner');

      if ( empty($gambar) ) {

        $this->validate($request, [
          'nama_partner'   => 'required|min:3|max:50',
          'alamat_partner' => 'required|min:5|max:50',
          'pic_partner'    => 'required|min:5|max:50',
          'tlp_partner'    => 'required|digits_between:5,20|numeric',
          'kota_partner'   => 'required|min:3|max:50',
          'npwp_partner'   => 'required|min:5|numeric',
          'no_rekening'    => 'required|min:5|numeric',
        ]);

        //$update = JenisKamar::where('jenis_id', $id)->first();
        $nama_partner   = $request['nama_partner'];
        $alamat_partner = $request['alamat_partner'];
        $pic_partner    = $request['pic_partner'];
        $tlp_partner    = $request['tlp_partner'];
        $kota_partner   = $request['kota_partner'];
        $npwp_partner   = $request['npwp_partner'];
        $no_rekening    = $request['no_rekening'];
        //$update->update();

        DB::table('partner')
                    ->where('id_partner', $id)
                    ->update(['nama_partner'  => $nama_partner,
                              'alamat_partner'=> $alamat_partner,
                              'pic_partner'   => $pic_partner,
                              'tlp_partner'   => $tlp_partner,
                              'kota_partner'  => $kota_partner,
                              'npwp_partner'  => $npwp_partner,
                              'no_rekening'   => $no_rekening,]);

        flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
        return redirect()->to('/showPartner');

      } else { // if empty value request file image

            $gambar = $request->file('foto_partner');

            $gambarName = $update->foto_partner;              // delete old image and change new image
            unlink(public_path('image/'.$gambarName));

            $fileName   = date('Y-m-d')."_ImgPartnerUpdate_".$gambar->getClientOriginalName(); // modified filename for anticipation same file name
            $request->file('foto_partner')->move("image/", $fileName);

            $this->validate($request, [
              'nama_partner'   => 'required|min:3|max:50',
              'alamat_partner' => 'required|min:5|max:50',
              'pic_partner'    => 'required|min:5|max:50',
              'tlp_partner'    => 'required|digits_between:5,20|numeric',
              'kota_partner'   => 'required|min:3|max:50',
              'npwp_partner'   => 'required|min:5|numeric',
              'no_rekening'    => 'required|min:5|numeric',
            ]);

            //$update = JenisKamar::where('jenis_id', $id)->first();
            $nama_partner   = $request['nama_partner'];
            $alamat_partner = $request['alamat_partner'];
            $pic_partner    = $request['pic_partner'];
            $tlp_partner    = $request['tlp_partner'];
            $kota_partner   = $request['kota_partner'];
            $npwp_partner   = $request['npwp_partner'];
            $no_rekening    = $request['no_rekening'];
            //$update->update();

            DB::table('partner')
                        ->where('id_partner', $id)
                        ->update(['nama_partner'  => $nama_partner,
                                  'alamat_partner'=> $alamat_partner,
                                  'pic_partner'   => $pic_partner,
                                  'tlp_partner'   => $tlp_partner,
                                  'kota_partner'  => $kota_partner,
                                  'npwp_partner'  => $npwp_partner,
                                  'no_rekening'   => $no_rekening,
                                  'foto_partner'  => $fileName,]);

            flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
            return redirect()->to('/showPartner');

      }

    }

  public function create()
    {
      return view('admin/addPartner');
    }

  public function store(Request $request)
    {

        $this->validate($request, [
            'nama_partner'   => 'required|min:3|max:50',
            'alamat_partner' => 'required|min:5|max:50',
            'pic_partner'    => 'required|min:5|max:50',
            'tlp_partner'    => 'required|digits_between:5,20|numeric',
            'kota_partner'   => 'required|min:3|max:50',
            'npwp_partner'   => 'required|min:5|numeric',
            'no_rekening'    => 'required|min:5|numeric',
            'foto_partner'   => 'required',
        ]);

         $tambah = new Partner();
         $tambah->id_partner     = uniqid();
         $tambah->nama_partner   = $request->nama_partner;
         $tambah->alamat_partner = $request->alamat_partner;
         $tambah->pic_partner    = $request->pic_partner;
         $tambah->tlp_partner    = $request->tlp_partner;
         $tambah->kota_partner   = $request->kota_partner;
         $tambah->npwp_partner   = $request->npwp_partner;
         $tambah->no_rekening    = $request->no_rekening;

         $gambar  = $request->file('foto_partner');
         $fileGambar  = date('Y-m-d')."_ImgPartner_".$gambar->getClientOriginalName(); // modified filename for anticipation same file name
         $request->file('foto_partner')->move("image/", $fileGambar);
         $tambah->foto_partner = $fileGambar;
         $tambah->save();
         //dd($tambah);

         flash()->success('Succsess', 'Wow Good Job, Succsess Submit Data !');
         return redirect('/showPartner');
    }

  public function destroy($id)
    {
      $hapus = DB::table('partner')->where('id_partner', $id)->first();
      $foto  = $hapus->foto_partner;
      unlink(public_path('image/'.$foto));
      DB::table('partner')->where('id_partner', $id)->delete();
      //$hapus->delete();

      flash()->overlay('Succsess', 'Wow Good Job, Succsess Deleted Data !');
      return redirect('/showPartner');
    }
}
