<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Spk;
use Excel;
use Auth;
use Uuid;
use PDF;

class spkController extends Controller
{

  public function __construct()     // make akses this must login first
    {
        $this->middleware('auth');
    }

  public function index()
    {
        $datas = Spk::get();
        return view('admin/showSpk')->with('datas', $datas);
    }

  public function indexRo()
    {
        $nama_ro = Auth::user()->nama_ro;
        //$datas = Spk::where('nama_ro', $nama_ro)->get();
        $datas   = DB::table('spk')->where([
                                            ['nama_ro', $nama_ro],
                                            ['tgl_duedate_spk', '!=', null],
                                          ])->get();
        //dd($datas);
        return view('admin/showSpkByRo')->with('datas', $datas);
    }

public function indexMso()
  {
    $nik   = Auth::user()->nik_karyawan;
    $datas = Spk::where('nik_karyawan', $nik)->get();
    return view('admin/showSpkByMso')->with('datas', $datas);
  }

 public function indexPartner()
   {
       $datas = Spk::get();
       return view('admin/showSpkByPartner')->with('datas', $datas);
   }

 public function indexFinance()
   {
       $datas = Spk::get();
       return view('admin/showSpkByFinance')->with('datas', $datas);
   }

  public function view($id)
    {
      $tampil   = Spk::where('id_spk', $id)->first();
      $data_mso = DB::table('mso')->where('kota_mso', $tampil->kota_mso)->first();

      // if data mso null
      if (empty($data_mso)) {
        flash()->error('Error', 'Kota Mso tidak ditemukan silahkan edit!');
        return redirect('/showSpk');
      }

      $partner  = DB::table('partner')->where('id_partner', $tampil->id_partner)->first();
      return view('admin/viewSpk')->with(compact('tampil'))
                                  ->with(compact('data_mso'))
                                  ->with(compact('partner'));
    }

 public function viewPdf($id)
   {
     $tampilPdf = Spk::where('id_spk', $id)->first();
     $data_ro   = DB::table('ro')->where('kota_ro', $tampilPdf->nama_ro)->first();
     $partner   = DB::table('partner')->where('id_partner', $tampilPdf->id_partner)->first();
     $karyawan  = DB::table('users')->where('nik_karyawan', $tampilPdf->nik_karyawan)->first();
     //dd($karyawan);
     return view('admin/spkPdf')->with(compact('tampilPdf'))
                                 ->with(compact('data_ro'))
                                 ->with(compact('partner'))
                                 ->with(compact('karyawan'));
   }

  public function downloadPdf($id)
    {
      $tampilPdf = Spk::where('id_spk', $id)->first();
      $data_ro   = DB::table('ro')->where('kota_ro', $tampilPdf->nama_ro)->first();
      $partner   = DB::table('partner')->where('id_partner', $tampilPdf->id_partner)->first();
      $karyawan  = DB::table('users')->where('nik_karyawan', $tampilPdf->nik_karyawan)->first();

      $data = [
            'id'        => $id,
            'tampilPdf' => $tampilPdf,
            'data_ro'   => $data_ro,
            'partner'   => $partner,
            'karyawan'  => $karyawan,
        ];

        $pdf = PDF::loadView('admin/downloadSpkPdf', $data); //load view page
        return $pdf->download('spkPdf.pdf'); // download pdf file
    }

  public function streamPdf($id)
    {
      $tampilPdf = Spk::where('id_spk', $id)->first();
      $data_ro   = DB::table('ro')->where('kota_ro', $tampilPdf->nama_ro)->first();
      $partner   = DB::table('partner')->where('id_partner', $tampilPdf->id_partner)->first();
      $karyawan  = DB::table('users')->where('nik_karyawan', $tampilPdf->nik_karyawan)->first();

      $data = [
            'id'        => $id,
            'tampilPdf' => $tampilPdf,
            'data_ro'   => $data_ro,
            'partner'   => $partner,
            'karyawan'  => $karyawan,
        ];

        $pdf = PDF::loadView('admin/downloadSpkPdf', $data); //load view page
        return $pdf->stream(); // view pdf
    }

  public function create()
    {
      $partners = DB::table('partner')->get();
      $datas_ro = DB::table('ro')->get();

      return view('admin/addSpk')->with(compact('partners'))
                                 ->with(compact('datas_ro'));
    }

  public function destroy($id)
    {
        $hapus = DB::table('spk')->where('id_spk', $id)->first();
        $foto_1 = $hapus->foto_1;
        $foto_2 = $hapus->foto_2;

        if ($foto_1 == 'no_image.jpg' AND $foto_2 == 'no_image.jpg') {
            DB::table('spk')->where('id_spk', $id)->delete();
        } else {
          unlink(public_path('image/'.$foto_1));
          unlink(public_path('image/'.$foto_2));
          DB::table('spk')->where('id_spk', $id)->delete();
        }

        flash()->overlay('Succsess', 'Wow Good Job, Succsess Deleted Data !');
        return redirect('/showSpk');
    }

  public function edit($id)
    {

        $tampiledit = Spk::where('id_spk', $id)->first();
        $data_ro    = DB::table('ro')->get();
        $partner    = DB::table('partner')->where('id_partner', $tampiledit->id_partner)->first();
        $data_mso   = DB::table('mso')->where('kota_mso', $tampiledit->kota_mso)->first();
        $karyawan   = DB::table('users')->where([
                                            ['nama_ro', $tampiledit->nama_ro],
                                            ['jabatan', '=', 'Admin MSO'],
                                          ])->get();
        //dd($karyawan);
        return view('admin/editSpk')->with(compact('tampiledit'))
                                    ->with(compact('data_ro'))
                                    ->with(compact('partner'))
                                    ->with(compact('data_mso'))
                                    ->with(compact('karyawan'));
    }

  public function editRo($id)
    {
      $tampiledit = Spk::where('id_spk', $id)->first();
      $partner    = DB::table('partner')->where('id_partner', $tampiledit->id_partner)->first();
      $data_mso   = DB::table('mso')->where('kota_mso', $tampiledit->kota_mso)->first();
      $karyawan   = DB::table('users')->where([
                                          ['nama_ro', $tampiledit->nama_ro],
                                          ['jabatan', '=', 'Admin MSO'],
                                        ])->get();
      //dd($karyawan);
      return view('admin/editSpkRo')->with(compact('tampiledit'))
                                  ->with(compact('partner'))
                                  ->with(compact('data_mso'))
                                  ->with(compact('karyawan'));
    }

  public function editMso($id)
    {
        $tampiledit = Spk::where('id_spk', $id)->first();
        $datenow    = date('d-m-Y');
        $partner    = DB::table('partner')->where('id_partner', $tampiledit->id_partner)->first();
        $data_ro    = DB::table('ro')->where('kota_ro', $tampiledit->nama_ro)->first();
        $data_mso   = DB::table('mso')->where('nama_ro', $tampiledit->nama_ro)->get();
        $data_partner  = DB::table('partner')->where('id_partner', $tampiledit->id_partner)->first();
        return view('admin/editSpkMso')->with(compact('datenow'))
                                      ->with(compact('tampiledit'))
                                      ->with(compact('partner'))
                                      ->with(compact('data_ro'))
                                      ->with(compact('data_mso'))
                                      ->with(compact('data_partner'));
    }

  public function update(Request $request, $id)
    {

        $update = Spk::where('id_spk', $id)->first();
        $gambar1 = $request->file('foto_1');
        $gambar2 = $request->file('foto_2');

        if ( empty($gambar1) AND empty($gambar2) ) {

          $no_spk            = $request['no_spk'];
          $tgl_duedate_spk   = $request['tgl_duedate_spk'];
          $jenis_spk         = $request['jenis_spk'];
          $perintah_spk      = $request['perintah_spk'];
          $status_spk        = $request['status_spk'];
          $id_ro             = $request['id_ro'];
          $kota_mso          = strtoupper($request['kota_mso']);


          $var = DB::table('ro')->where('id_ro', $id_ro)->first();
          $nama_ro = $var->kota_ro;

          $foto_1 = 'no_image.jpg';
          $foto_2 = 'no_image.jpg';

          /* Funtion nama Mso
          $data_mso = DB::table('users')->where('nik_karyawan', $nik_karyawan)->first();
          $nama_mso = $data_mso->nama_karyawan;
          */

          // function thermal
          $awal = $request['thermal_awal'];
          $drop = $request['thermal_drop'];
          $akhir = $awal + $drop;

          // Funtion convert d-m-Y to Y-m-d
          $convert_tgl_duedate_spk = date('Y-m-d', strtotime($tgl_duedate_spk));

          DB::table('spk')->where('id_spk', $id)
                          ->update(['no_spk'            => $no_spk,
                                    'tgl_duedate_spk'   => $convert_tgl_duedate_spk,
                                    'jenis_spk'         => $jenis_spk,
                                    'perintah_spk'      => $perintah_spk,
                                    'status_spk'        => $status_spk,
                                    'id_ro'             => $id_ro,
                                    'nama_ro'           => $nama_ro,
                                    'kota_mso'          => $kota_mso]);

          flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
          return redirect()->to('/showSpk');


        } else { // if empty value request file image

          $no_spk            = $request['no_spk'];
          $tgl_duedate_spk   = $request['tgl_duedate_spk'];
          $jenis_spk         = $request['jenis_spk'];
          $perintah_spk      = $request['perintah_spk'];
          $status_spk        = $request['status_spk'];
          $nik_karyawan      = $request['nik_karyawan'];
          $id_ro             = $request['id_ro'];
          $nama_ro           = $request['nama_ro'];
          $kota_mso          = strtoupper($request['kota_mso']);

          // Funtion nama Mso
          $data_mso = DB::table('users')->where('nik_karyawan', $nik_karyawan)->first();
          $nama_mso = $data_mso->nama_karyawan;

          // function thermal
          $awal = $request['thermal_awal'];
          $drop = $request['thermal_drop'];
          $akhir = $awal + $drop;

          // Funtion Save Image
          $gambar1      = $request->file('foto_1');
          $fileGambar1  = 'ImgSpk_'.date('Y-m-d')."_".$gambar1->getClientOriginalName(); // modified filename for anticipation same file name
          $request->file('foto_1')->move("image/", $fileGambar1);
          $foto_1       = $fileGambar1;

          $gambar2      = $request->file('foto_2');
          $fileGambar2  = 'ImgSpk_'.date('Y-m-d')."_".$gambar2->getClientOriginalName(); // modified filename for anticipation same file name
          $request->file('foto_2')->move("image/", $fileGambar2);
          $foto_2       = $fileGambar2;

          // Funtion convert d-m-Y to Y-m-d
          $convert_tgl_spk = date('Y-m-d', strtotime($tgl_spk));
          $convert_tgl_pengerjaan = date('Y-m-d', strtotime($tgl_pengerjaan));
          $convert_tgl_duedate_spk = date('Y-m-d', strtotime($tgl_duedate_spk));

          DB::table('spk')->where('id_spk', $id)
                          ->update(['no_spk'            => $no_spk,
                                    'tgl_duedate_spk'   => $convert_tgl_duedate_spk,
                                    'jenis_spk'         => $jenis_spk,
                                    'perintah_spk'      => $perintah_spk,
                                    'status_spk'        => $status_spk,
                                    'id_ro'             => $id_ro,
                                    'nama_ro'           => $nama_ro,
                                    'kota_mso'          => $kota_mso]);

          flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
          return redirect()->to('/showSpk');

        }

    }

    public function updateRo(Request $request, $id)
      {

            $update = Spk::where('id_spk', $id)->first();

            $status_spk    = $request['status_spk'];
            $nama_mso      = $request['nama_mso'];
            $id_ro         = $request['id_ro'];
            $nik_karyawan  = $request['nik_karyawan'];

            // Funtion nama Mso
            $data_mso = DB::table('users')->where('nik_karyawan', $nik_karyawan)->first();
            $nama_mso = $data_mso->nama_karyawan;

            DB::table('spk')
                        ->where('id_spk', $id)
                        ->update(['status_spk'   => $status_spk,
                                  'nik_karyawan' => $nik_karyawan,
                                  'nama_mso'     => $nama_mso,
                                  'id_ro'        => $id_ro]);

            flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
            return redirect()->to('/showSpkByRo');

      }

    public function updateMso(Request $request, $id)
        {

              $update = Spk::where('id_spk', $id)->first();

              $this->validate($request, [
                  'sn_edc'       => 'required|numeric',
                  'nmr_simcard'  => 'required|numeric',
                  'sn_simcard'   => 'required|numeric',
                  'test_debit'   => 'required|numeric',
                  'test_kredit'  => 'required|numeric',
                  'test_prepaid' => 'required|numeric',
                  'thermal_drop' => 'required|numeric',
              ]);

              //$tgl_pengerjaan    = $request['tgl_pengerjaan'];
              $status_spk        = $request['status_spk'];
              $status_pengerjaan = $request['status_pengerjaan'];
              $jenis_edc         = $request['jenis_edc'];
              $sn_edc            = $request['sn_edc'];
              $tipe_komunikasi   = $request['tipe_komunikasi'];
              $provider          = $request['provider'];
              $nmr_simcard       = $request['nmr_simcard'];
              $sn_simcard        = $request['sn_simcard'];
              $adaptor           = $request['adaptor'];
              $edc               = $request['edc'];
              $stiker            = $request['stiker'];
              $nama_sesuai_lokasi     = $request['nama_sesuai_lokasi'];
              $alamat_sesuai_lokasi   = $request['alamat_sesuai_lokasi'];
              $tid_mid_sesuai    = $request['tid_mid_sesuai'];
              $test_debit        = $request['test_debit'];
              $test_kredit       = $request['test_kredit'];
              $test_prepaid      = $request['test_prepaid'];
              $thermal_awal      = $request['thermal_awal'];
              $thermal_drop      = $request['thermal_drop'];
              $thermal_akhir     = $request['thermal_akhir'];
              $keterangan_spk    = $request['keterangan_spk'];
              $jam_mulai         = $request['jam_mulai'];
              $jam_selesai       = $request['jam_selesai'];

              // function thermal
              $awal  = $request['thermal_awal'];
              $drop  = $request['thermal_drop'];
              $akhir = $awal + $drop;

              // Delete old image for update
              $foto_1 = $update->foto_1;
              $foto_2 = $update->foto_2;

              if ($foto_1 == 'no_image.jpg' AND $foto_2 == 'no_image.jpg') {

                // Function Save Image
                $tid          = $update->tid;
                $gambar1      = $request->file('foto_1');
                $fileGambar1  = 'ImgSpk1_'.date('dmy_').$tid.".".$gambar1->getClientOriginalExtension(); // modified filename for anticipation same file name
                $request->file('foto_1')->move("image/", $fileGambar1);
                $foto_1       = $fileGambar1;

                $gambar2      = $request->file('foto_2');
                $fileGambar2  = 'ImgSpk2_'.date('dmy_').$tid.".".$gambar2->getClientOriginalExtension(); // modified filename for anticipation same file name
                $request->file('foto_2')->move("image/", $fileGambar2);
                $foto_2       = $fileGambar2;

              } else {

                unlink(public_path('image/'.$foto_1));
                unlink(public_path('image/'.$foto_2));
                // Function Save Image
                $tid          = $update->tid;
                $gambar1      = $request->file('foto_1');
                $fileGambar1  = 'ImgSpk1_'.date('dmy_').$tid.".".$gambar1->getClientOriginalExtension(); // modified filename for anticipation same file name
                $request->file('foto_1')->move("image/", $fileGambar1);
                $foto_1       = $fileGambar1;

                $gambar2      = $request->file('foto_2');
                $fileGambar2  = 'ImgSpk2_'.date('dmy_').$tid.".".$gambar2->getClientOriginalExtension(); // modified filename for anticipation same file name
                $request->file('foto_2')->move("image/", $fileGambar2);
                $foto_2       = $fileGambar2;

              }

              // Funtion convert d-m-Y to Y-m-d
              //$convert_tgl_pengerjaan = date('Y-m-d ', strtotime($tgl_pengerjaan));
              $datenow   = date('Y-m-d ');
              $now       = $datenow.$jam_mulai;
              $update_at = date('Y-m-d H:i:s');

              DB::table('spk')
                          ->where('id_spk', $id)
                          ->update(['tgl_pengerjaan'    => $now,
                                    'foto_1'            => $foto_1,
                                    'foto_2'            => $foto_2,
                                    'status_spk'        => $status_spk,
                                    'status_pengerjaan' => $status_pengerjaan,
                                    'jenis_edc'         => $jenis_edc,
                                    'sn_edc'            => $sn_edc,
                                    'tipe_komunikasi'   => $tipe_komunikasi,
                                    'provider'          => $provider,
                                    'nmr_simcard'       => $nmr_simcard,
                                    'sn_simcard'        => $sn_simcard,
                                    'adaptor'           => $adaptor,
                                    'edc'               => $edc,
                                    'stiker'            => $stiker,
                                    'nama_sesuai_lokasi'   => $nama_sesuai_lokasi,
                                    'alamat_sesuai_lokasi' => $alamat_sesuai_lokasi,
                                    'tid_mid_sesuai'    => $tid_mid_sesuai,
                                    'test_debit'        => $test_debit,
                                    'test_kredit'       => $test_kredit,
                                    'test_prepaid'      => $test_prepaid,
                                    'thermal_awal'      => $thermal_awal,
                                    'thermal_drop'      => $thermal_drop,
                                    'thermal_akhir'     => $akhir,
                                    'keterangan_spk'    => $keterangan_spk,
                                    'updated_at'         => $update_at]);

              flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
              return redirect()->to('/showSpkByMso');

        }

    public function download(Request $request, $type)
      {
        $data = Spk::get()->toArray();
        return Excel::create('Backup_Data_SPK_'.date('d-m-Y'), function($excel) use ($data) {
          $excel->sheet('DataSpk', function($sheet) use ($data)
              {
            $sheet->fromArray($data);
              });
        })->download($type);
      }

    public function import(Request $request)
       {
          if($request->hasFile('import_file_spk')){
            $path = $request->file('import_file_spk')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
              foreach ($data->toArray() as $key => $value) {
                $date = date('Y-m-d H:i:s');
                $insert[] = ['id_spk' => $value['id_spk'], 'no_spk' => $value['no_spk'],
                'tgl_spk' => $value['tgl_spk'], 'tgl_pengerjaan' => $value['tgl_pengerjaan'],
                'tgl_duedate_spk' => $value['tgl_duedate_spk'], 'tid' => $value['tid'],
                'mid' => $value['mid'], 'nama_merchant' => $value['nama_merchant'],
                'alamat_merchant' => $value['alamat_merchant'], 'pic_merchant' => $value['pic_merchant'],
                'kontak_merchant' => $value['kontak_merchant'], 'jenis_spk' => $value['jenis_spk'],
                'perintah_spk' => $value['perintah_spk'], 'foto_1' => $value['foto_1'],
                'foto_2' => $value['foto_2'], 'status_spk' => $value['status_spk'],
                'status_pengerjaan' => $value['status_pengerjaan'], 'jenis_edc' => $value['jenis_edc'],
                'sn_edc' => $value['sn_edc'], 'tipe_komunikasi' => $value['tipe_komunikasi'],
                'provider' => $value['provider'], 'nmr_simcard' => $value['nmr_simcard'],
                'sn_simcard' => $value['sn_simcard'], 'adaptor' => $value['adaptor'], 'edc' => $value['edc'],
                'stiker' => $value['stiker'], 'nama_sesuai_lokasi' => $value['nama_sesuai_lokasi'],
                'alamat_sesuai_lokasi' => $value['alamat_sesuai_lokasi'], 'tid_mid_sesuai' => $value['tid_mid_sesuai'],
                'test_debit' => $value['test_debit'], 'test_kredit' => $value['test_kredit'],
                'test_prepaid' => $value['test_prepaid'], 'thermal_awal' => $value['thermal_awal'],
                'thermal_drop' => $value['thermal_drop'], 'thermal_akhir' => $value['thermal_akhir'],
                'keterangan_spk' => $value['keterangan_spk'], 'nik_karyawan' => $value['nik_karyawan'],
                'nama_mso' => $value['nama_mso'], 'id_ro' => $value['id_ro'], 'nama_ro' => $value['nama_ro'],
                'kota_mso' => $value['kota_mso'], 'id_partner' => $value['id_partner'], 'status_invoicing' => $value['status_invoicing'],
                'id_invoice' => $value['id_invoice'], 'created_at' => $value['created_at'] ];
              }
                //Kamar::truncate();
                // menonaktifkan fungsi foreign key sebelum melakukan truncate
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                DB::table('spk')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
              if(!empty($insert)){
                Spk::insert($insert);
                flash()->success('Succsess', 'Wow Good Job, Succsess Import Data !');
                return redirect('/showSpk');
              }
            }
          }
          flash()->overlay('Error', 'Please Check your file, Something is wrong there.');
          return redirect('/addSpk');
      }

    public function importPart(Request $request)
       {
          if($request->hasFile('import_file_spk')){
            $path = $request->file('import_file_spk')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
              foreach ($data->toArray() as $key => $value) {
                $id         = Uuid::generate(4);
                $id_partner = $request->id_partner;
                $tgl_spk    = date('Y-m-d H:i:s');
                $date       = date('Y-m-d H:i:s');
                $id_ro      = '-';
                $nama_ro    = '-';
                $foto_1     = 'no_image.jpg';
                $foto_2     = 'no_image.jpg';

                $insert[] = ['id_spk' => $id, 'no_spk' => $value['no_spk'],
                'tgl_spk' => $tgl_spk, 'tid' => $value['tid'],
                'mid' => $value['mid'], 'nama_merchant' => $value['nama_merchant'],
                'alamat_merchant' => $value['alamat_merchant'], 'pic_merchant' => $value['pic_merchant'],
                'kontak_merchant' => $value['kontak_merchant'], 'jenis_spk' => $value['jenis_spk'],
                'perintah_spk' => $value['perintah_spk'], 'foto_1' => $foto_1,
                'foto_2' => $foto_2, 'status_spk' => $value['status_spk'],
                'status_pengerjaan' => $value['status_pengerjaan'], 'jenis_edc' => $value['jenis_edc'],
                'sn_edc' => $value['sn_edc'], 'tipe_komunikasi' => $value['tipe_komunikasi'],
                'provider' => $value['provider'], 'nmr_simcard' => $value['nmr_simcard'],
                'sn_simcard' => $value['sn_simcard'], 'adaptor' => $value['adaptor'], 'edc' => $value['edc'],
                'stiker' => $value['stiker'], 'nama_sesuai_lokasi' => $value['nama_sesuai_lokasi'],
                'alamat_sesuai_lokasi' => $value['alamat_sesuai_lokasi'], 'tid_mid_sesuai' => $value['tid_mid_sesuai'],
                'test_debit' => $value['test_debit'], 'test_kredit' => $value['test_kredit'],
                'test_prepaid' => $value['test_prepaid'], 'thermal_awal' => $value['thermal_awal'],
                'thermal_drop' => $value['thermal_drop'], 'thermal_akhir' => $value['thermal_akhir'],
                'keterangan_spk' => $value['keterangan_spk'], 'nik_karyawan' => $value['nik_karyawan'],
                'nama_mso' => $value['nama_mso'], 'id_ro' => $id_ro, 'nama_ro' => $nama_ro,
                'kota_mso' => $value['kota_mso'], 'id_partner' => $id_partner, 'status_invoicing' => $value['status_invoicing'],
                'id_invoice' => $value['id_invoice'], 'created_at' => $date ];
              }
                //Kabar::truncate();
              if(!empty($insert)){
                Spk::insert($insert);
                flash()->success('Succsess', 'Wow Good Job, Succsess Import Data !');
                return redirect('/showSpk');
              }
            }
          }
          flash()->overlay('Error', 'Please Check your file, Something is wrong there.');
          return redirect('/addSpk');
      }

}
