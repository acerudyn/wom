<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Ro;
use Excel;
use Auth;

class roController extends Controller
{

  public function __construct()     // make akses this must login first
    {
        $this->middleware('auth');
    }

  public function index()
    {
        $datas = Ro::get();
        //dd($datas);
        return view('admin/showRo')->with('datas', $datas);
    }

  public function view($id)
    {
      //$jenis_id = $id;
      $tampil   = Ro::where('id_ro', $id)->first();
      //dd($tampil);
      return view('admin/viewRo')->with('tampil', $tampil);
    }

  public function edit($id)
    {
        //$jenis_id   = $id;
        $tampiledit = Ro::where('id_ro', $id)->first();
        return view('admin/editRo')->with('tampiledit', $tampiledit);
    }

  public function create()
    {
      return view('admin/addRo');
    }

  public function destroy($id)
    {
        $hapus = Ro::where('id_ro', $id);
        $hapus->delete();

        flash()->overlay('Succsess', 'Wow Good Job, Succsess Deleted Data !');
        return redirect('/showRo');
    }


  public function store(Request $request)
    {

        $this->validate($request, [
            'nama_ro' => 'required|min:3',
            'kota_ro' => 'required|min:3',
        ]);

         $tambah = new Ro();
         $tambah->id_ro   = uniqid();
         $tambah->nama_ro = $request->nama_ro;
         $tambah->kota_ro = $request->kota_ro;
         $tambah->save();
         //dd($tambah);

         flash()->success('Succsess', 'Wow Good Job, Succsess Submit Data !');
         return redirect('/showRo');
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nama_ro' => 'required|min:3',
            'kota_ro'  => 'required|min:3',
        ]);

        //$update = JenisKamar::where('jenis_id', $id)->first();
        $nama_ro = $request['nama_ro'];
        $kota_ro = $request['kota_ro'];
        //$update->update();

        DB::table('ro')
                    ->where('id_ro', $id)
                    ->update(['nama_ro' => $nama_ro,
                              'kota_ro' => $kota_ro]);

        flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
        return redirect()->to('/showRo');

    }

    public function download(Request $request, $type)
    	{
    		$data = Ro::get()->toArray();
    		return Excel::create('Backup_Data_RO_'.date('d-m-Y'), function($excel) use ($data) {
    			$excel->sheet('DataRO', function($sheet) use ($data)
    	        {
    				$sheet->fromArray($data);
    	        });
    		})->download($type);
    	}

    public function import(Request $request)
       {
          if($request->hasFile('import_file_ro')){
            $path = $request->file('import_file_ro')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
              foreach ($data->toArray() as $key => $value) {
                $date = date('Y-m-d H:i:s');
                    $insert[] = ['id_ro' => $value['id_ro'], 'nama_ro' => $value['nama_ro'],
                    'kota_ro' => $value['kota_ro'], 'created_at' => $date ];
              }
                //Kamar::truncate();
                // menonaktifkan fungsi foreign key sebelum melakukan truncate
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                DB::table('ro')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
              if(!empty($insert)){
                Ro::insert($insert);
                flash()->success('Succsess', 'Wow Good Job, Succsess Import Data !');
                return redirect('/showRo');
              }
            }
          }
          flash()->overlay('Error', 'Please Check your file, Something is wrong there.');
          return redirect('/showRo');
      }

    public function importPart(Request $request)
       {
          if($request->hasFile('import_file_ro')){
            $path = $request->file('import_file_ro')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
              foreach ($data->toArray() as $key => $value) {
                $id     = uniqid();
                $date   = date('Y-m-d H:i:s');
                    $insert[] = [ 'id_ro' => $id, 'nama_ro' => $value['nama_ro'],
                    'kota_ro' => $value['kota_ro'], 'created_at' => $date ];
              }
                //Kabar::truncate();
              if(!empty($insert)){
                Ro::insert($insert);
                flash()->success('Succsess', 'Wow Good Job, Succsess Import Data !');
                return redirect('/showRo');
              }
            }
          }
          flash()->overlay('Error', 'Please Check your file, Something is wrong there.');
          return redirect('/showRo');
      }

}
