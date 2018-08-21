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

class DataSpkController extends Controller
{

  public function __construct()     // make akses this must login first
    {
        $this->middleware('auth');
    }

  public function lookup()
    {
        //$datas    = Spk::get();
        $datas    = DB::table('spk')->limit(0)->get();
        $partners = DB::table('partner')->get();

        return view('admin/dataLookup')->with(compact('datas'))
                                       ->with(compact('partners'));
    }

  public function filter(Request $request)
    {

        $partners = DB::table('partner')->get();

        $this->validate($request, [
            'value_param' => 'required|min:3',
        ]);

        $id_partner   = $request->id_partner;
        $parameter    = $request->parameter;
        $value_param  = $request->value_param;

        $datas = DB::table('spk')->where([
                                            ['id_partner', $id_partner],
                                            [$parameter, $value_param],
                                          ])->get();

        return view('admin/dataLookup')->with(compact('datas'))
                                       ->with(compact('partners'));
    }

  public function viewLookup($id)
    {
      $tampil   = Spk::where('id_spk', $id)->first();
      $data_mso = DB::table('mso')->where('kota_mso', $tampil->kota_mso)->first();

      // if data mso null
      if (empty($data_mso)) {
        flash()->error('Error', 'Kota Mso tidak ditemukan silahkan edit!');
        return redirect('/showSpk');
      }

      $partner  = DB::table('partner')->where('id_partner', $tampil->id_partner)->first();
      return view('admin/viewSpkLookup')->with(compact('tampil'))
                                        ->with(compact('data_mso'))
                                        ->with(compact('partner'));
    }

  public function showExport()
    {
        $partners = DB::table('partner')->get();
        return view('admin/spkExport')->with('partners', $partners);
    }

 public function filterExport(Request $request)
    {

      $id_partner = $request->id_partner;
      $jenis_spk  = $request->jenis_spk;
      $status_spk = $request->status_spk;
      $start      = $request->awal_periode;
      $end        = $request->akhir_periode;
      $start_validasi = $request->awal_validasi;
      $end_validasi   = $request->akhir_validasi;
      $type       = 'xlsx';

      // Funtion convert d-m-Y to Y-m-d
      $convert_awal  = date('Y-m-d', strtotime($start));
      $convert_akhir = date('Y-m-d', strtotime($end));
      $convert_awal_validasi  = date('Y-m-d', strtotime($start_validasi));
      $convert_akhir_validasi = date('Y-m-d', strtotime($end_validasi));

      // funtion filter if status all
      if ($id_partner == 'all' AND $jenis_spk == 'all' AND $status_spk == 'all') {
          $data = DB::table('spk')->whereBetween('tgl_spk',[$convert_awal, $convert_akhir])
                                  ->whereBetween('updated_at',[$convert_awal_validasi, $convert_akhir_validasi])->get();
          //dd($data);

          $data = json_decode( json_encode($data), true);
          return Excel::create('Data_SPK_All_'.date('d-m-Y'), function($excel) use ($data) {
          	$excel->sheet('DataSpk', function($sheet) use ($data)
          	      {
          		$sheet->fromArray($data);
          	      });
          })->download($type);

      } elseif ($id_partner != 'all' AND $jenis_spk != 'all' AND $status_spk != 'all') {
          $data  = DB::table('spk')->where([
                                              ['id_partner', $id_partner],
                                              ['jenis_spk', $jenis_spk],
                                              ['status_spk', $status_spk],
                                            ])->whereBetween('tgl_spk',[$convert_awal, $convert_akhir])
                                              ->whereBetween('updated_at',[$convert_awal_validasi, $convert_akhir_validasi])->get();
        //dd($data);

        $bank = DB::table('partner')->where('id_partner', $id_partner)->first();
        $data = json_decode( json_encode($data), true);
        return Excel::create('Data_SPK_'.$bank->nama_partner.'_'.date('d-m-Y'), function($excel) use ($data) {
        	$excel->sheet('DataSpk', function($sheet) use ($data)
        	      {
        		$sheet->fromArray($data);
        	      });
        })->download($type);
      } else {
        flash()->error('Error', 'Filter Tidak Support Kombinasi!');
        return redirect('/showExport');
      }


      /*
      $bank = DB::table('partner')->where('id_partner', $id_partner)->first();
      $data = DB::table('spk')->where('id_partner', $id_partner)->whereBetween('tgl_pengerjaan', [$convert_awal, $convert_akhir])->get();

      $datas  = DB::table('spk')->where([
                                          ['id_partner', $id_partner],
                                          [$parameter, $value_param],
                                        ])->get();

      $data = json_decode( json_encode($data), true);
      return Excel::create('Data_SPK_'.$bank->nama_partner.'_'.date('d-m-Y'), function($excel) use ($data) {
      	$excel->sheet('DataSpk', function($sheet) use ($data)
      	      {
      		$sheet->fromArray($data);
      	      });
      })->download($type);
      */

    }

public function grafikFilter()
  {
    $data = DB::table('ro')->get();
    return view('admin/grafikFilter')->with('data_ro', $data);
  }

public function grafikTahunan()
  {
    $data = DB::table('ro')->get();
    return view('admin/grafikTahunan')->with('data_ro', $data);
    //return view('admin/grafikTahunan');
  }

public function filterChart(Request $request)
  {

    $ro    = $request->ro;
    $start = $request->awal_periode;
    $end   = $request->akhir_periode;

    if ($ro == 'all') {
      // Funtion convert d-m-Y to Y-m-d
      $convert_awal  = date('Y-m-d', strtotime($start));
      $convert_akhir = date('Y-m-d', strtotime($end));

      $grafik = DB::table('spk')->whereBetween('tgl_spk',[$convert_awal, $convert_akhir])
      ->groupBy('date')
      ->orderBy('date', 'ASC')
      ->get([
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as value'),
            DB::raw('COUNT("CM") as cm')
      ])->toJSON();

      dd($grafik);
    } else {
      // Funtion convert d-m-Y to Y-m-d
      $convert_awal  = date('Y-m-d', strtotime($start));
      $convert_akhir = date('Y-m-d', strtotime($end));

      $grafik = DB::table('spk')->where('nama_ro', $ro)
      ->whereBetween('tgl_spk',[$convert_awal, $convert_akhir])
      ->groupBy('date')
      ->orderBy('date', 'ASC')
      ->get([
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as value')
      ])->toJSON();

      //dd($grafik);
    }

  $data_ro = DB::table('ro')->get();
  return view('admin/grafikMorris')->with(compact('grafik'))
                                   ->with(compact('data_ro'));

  }

public function grafikBulanan()
  {
      return view('admin/grafikBulanan');
  }


}
