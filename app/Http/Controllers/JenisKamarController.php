<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\JenisKamar;
use App\Http\Requests;
use Excel;
use Auth;

class JenisKamarController extends Controller
{
  public function __construct()     // make akses this must login first
    {
        $this->middleware('auth');
    }

  public function index()
    {
        $datas = JenisKamar::get();
        //dd($datas);
        return view('admin/showJenisKamar')->with('datas', $datas);
    }

  public function view($id)
    {
      //$jenis_id = $id;
      $tampil   = JenisKamar::where('jenis_id', $id)->first();
      //dd($tampil);
      return view('admin/viewJenisKamar')->with('tampil', $tampil);
    }

  public function edit($id)
    {
        //$jenis_id   = $id;
        $tampiledit = JenisKamar::where('jenis_id', $id)->first();
        return view('admin/editJenisKamar')->with('tampiledit', $tampiledit);
    }

  public function create()
    {
      return view('admin/addJenisKamar');
    }

  public function destroy($id)
    {
        $hapus = JenisKamar::where('jenis_id', $id);
        $hapus->delete();

        flash()->overlay('Succsess', 'Wow Good Job, Succsess Deleted Data !');
        return redirect('/showJenisKamar');
    }

  public function store(Request $request)
    {

        $this->validate($request, [
            'nama_jenis' => 'required|min:5',
            'fasilitas'  => 'required|min:5|max:1000',
        ]);

         $tambah     = new JenisKamar();
         $tambah->jenis_id   = uniqid();
         $tambah->admin_id   = Auth::user()->id;
         $tambah->nama_jenis = $request->nama_jenis;
         $tambah->fasilitas  = $request->fasilitas;
         $tambah->save();
         //dd($tambah);

         flash()->success('Succsess', 'Wow Good Job, Succsess Submit Data !');
         return redirect('/showJenisKamar');
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nama_jenis' => 'required|min:5',
            'fasilitas'  => 'required|min:5|max:1000',
        ]);

        //$update = JenisKamar::where('jenis_id', $id)->first();
        $nama_jenis = $request['nama_jenis'];
        $fasilitas  = $request['fasilitas'];
        //$update->update();

        DB::table('jenis_kamar')
                    ->where('jenis_id', $id)
                    ->update(['nama_jenis' => $nama_jenis,
                              'fasilitas'  => $fasilitas]);

        flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
        return redirect()->to('/showJenisKamar');

    }

    public function download(Request $request, $type)
    	{
    		$data = JenisKamar::get()->toArray();
    		return Excel::create('Backup_Data_Jenis_Kamar_'.date('d-m-Y'), function($excel) use ($data) {
    			$excel->sheet('DataJenisKamar', function($sheet) use ($data)
    	        {
    				$sheet->fromArray($data);
    	        });
    		})->download($type);
    	}

    public function import(Request $request)
       {
          if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
              foreach ($data->toArray() as $key => $value) {
                $date = date('Y-m-d H:i:s');
                    $insert[] = ['jenis_id' => $value['jenis_id'], 'admin_id' => $value['admin_id'],
                    'nama_jenis' => $value['nama_jenis'], 'fasilitas' => $value['fasilitas'], 'created_at' => $date ];
              }
                //Kamar::truncate();
                // menonaktifkan fungsi foreign key sebelum melakukan truncate
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                DB::table('jenis_kamar')->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
              if(!empty($insert)){
                JenisKamar::insert($insert);
                flash()->success('Succsess', 'Wow Good Job, Succsess Import Data !');
                return redirect('/showJenisKamar');
              }
            }
          }
          flash()->overlay('Error', 'Please Check your file, Something is wrong there.');
          return redirect('/restore');
      }

    public function importPart(Request $request)
       {
          if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
              foreach ($data->toArray() as $key => $value) {
                $id     = uniqid();
                $date   = date('Y-m-d H:i:s');
                    $insert[] = [ 'jenis_id' => $id, 'admin_id' => $value['admin_id'],
                    'nama_jenis' => $value['nama_jenis'], 'fasilitas' => $value['fasilitas'], 'created_at' => $date ];
              }
                //Kabar::truncate();
              if(!empty($insert)){
                JenisKamar::insert($insert);
                flash()->success('Succsess', 'Wow Good Job, Succsess Import Data !');
                return redirect('/showJenisKamar');
              }
            }
          }
          flash()->overlay('Error', 'Please Check your file, Something is wrong there.');
          return redirect('/restorepart');
      }

}
