<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Mso;
use Excel;
use Auth;

class msoController extends Controller
{
  public function __construct()     // make akses this must login first
    {
        $this->middleware('auth');
    }

  public function index()
    {
        $datas = Mso::get();
        //dd($datas);
        return view('admin/showMso')->with('datas', $datas);
    }

  public function view($id)
    {
      //$jenis_id = $id;
      $tampil   = Mso::where('id_mso', $id)->first();
      //dd($tampil);
      return view('admin/viewMso')->with('tampil', $tampil);
    }

  public function edit($id)
    {
        $tampiledit = Mso::where('id_mso', $id)->first();
        $datas_ro   = DB::table('ro')->get();
        return view('admin/editMso')->with(compact('tampiledit', 'datas_ro'));
    }

  public function create()
    {
      $datas_ro = DB::table('ro')->get();
      return view('admin/addMso')->with(compact('datas_ro'));
    }

  public function destroy($id)
    {
        $hapus = Mso::where('id_mso', $id);
        $hapus->delete();

        flash()->overlay('Succsess', 'Wow Good Job, Succsess Deleted Data !');
        return redirect('/showMso');
    }


  public function store(Request $request)
    {

        $this->validate($request, [
            'nama_ro'  => 'required|min:3',
            'kota_mso' => 'required|min:3',
        ]);

         $tambah = new Mso();
         $tambah->id_mso    = uniqid();
         $tambah->nama_ro  = $request->nama_ro;
         $tambah->kota_mso = strtoupper($request->kota_mso);
         $tambah->save();
         //dd($tambah);

         flash()->success('Succsess', 'Wow Good Job, Succsess Submit Data !');
         return redirect('/showMso');
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nama_ro'  => 'required|min:3',
            'kota_mso' => 'required|min:3',
        ]);

        //$update = JenisKamar::where('jenis_id', $id)->first();
        $nama_ro  = $request['nama_ro'];
        $kota_mso = strtoupper($request['kota_mso']);
        //$update->update();

        DB::table('mso')
                    ->where('id_mso', $id)
                    ->update(['nama_ro' => $nama_ro,
                              'kota_mso' => $kota_mso]);

        flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
        return redirect()->to('/showMso');

    }

    public function download(Request $request, $type)
      {
        $data = Mso::get()->toArray();
        return Excel::create('Backup_Data_MSO_'.date('d-m-Y'), function($excel) use ($data) {
          $excel->sheet('DataMSO', function($sheet) use ($data)
              {
            $sheet->fromArray($data);
              });
        })->download($type);
      }

    public function import(Request $request)
       {
          if($request->hasFile('import_file_mso')){
            $path = $request->file('import_file_mso')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
              foreach ($data->toArray() as $key => $value) {
                $date = date('Y-m-d H:i:s');
                    $insert[] = ['id_mso' => $value['id_mso'], 'nama_ro' => $value['nama_ro'],
                    'kota_mso' => $value['kota_mso'], 'created_at' => $date ];
              }
                //Kamar::truncate();
                // menonaktifkan fungsi foreign key sebelum melakukan truncate
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                DB::table('ro')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
              if(!empty($insert)){
                Mso::insert($insert);
                flash()->success('Succsess', 'Wow Good Job, Succsess Import Data !');
                return redirect('/showMso');
              }
            }
          }
          flash()->overlay('Error', 'Please Check your file, Something is wrong there.');
          return redirect('/addMso');
      }

    public function importPart(Request $request)
       {
          if($request->hasFile('import_file_mso')){
            $path = $request->file('import_file_mso')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
              foreach ($data->toArray() as $key => $value) {
                $id     = uniqid();
                $date   = date('Y-m-d H:i:s');
                    $insert[] = [ 'id_mso' => $id, 'nama_ro' => $value['nama_ro'],
                    'kota_mso' => $value['kota_mso'], 'created_at' => $date ];
              }
                //Kabar::truncate();
              if(!empty($insert)){
                Mso::insert($insert);
                flash()->success('Succsess', 'Wow Good Job, Succsess Import Data !');
                return redirect('/showMso');
              }
            }
          }
          flash()->overlay('Error', 'Please Check your file, Something is wrong there.');
          return redirect('/addMso');
      }
}
