<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Hotel;
use Uuid;

class hotelController extends Controller
{

  public function __construct()     // make akses this must login first
    {
        $this->middleware('auth');
    }

  public function index()
    {
        $datas = Hotel::get();
        return view('admin/showHotel')->with('datas', $datas);
    }

  public function view($id)
    {
      $tampil = Hotel::find($id);
      return view('admin/viewHotel')->with('tampil', $tampil);
    }

  public function edit($id)
    {
        $tampiledit = Hotel::where('id', $id)->first();
        return view('admin/editHotel')->with('tampiledit', $tampiledit);
    }

  public function update(Request $request, $id)
    {
        $update = Hotel::where('id', $id)->first();
        $gambar = $request->file('foto_hotel');

        if ( empty($gambar) ) {

              $update->nama_hotel = $request['nama_hotel'];
              $update->alamat = $request['alamat'];
              $update->telefon = $request['telefon'];
              $update->harga = $request['harga'];
              $update->fasilitas = $request['fasilitas'];
              $update->maps = $request['maps'];
              $update->update();

              flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
              return redirect()->to('/showHotel');

        } else { // if empty value request file image

              $gambar = $request->file('foto_hotel');

              $gambarName = $update->foto_hotel;              // delete old image and change new image
              unlink(public_path('image/'.$gambarName));

              $fileName   = date('Y-m-d-H:i:s')."-".$gambar->getClientOriginalName(); // modified filename for anticipation same file name
              $request->file('foto_hotel')->move("image/", $fileName);

              $update->nama_hotel = $request['nama_hotel'];
              $update->alamat = $request['alamat'];
              $update->telefon = $request['telefon'];
              $update->harga = $request['harga'];
              $update->fasilitas = $request['fasilitas'];
              $update->maps = $request['maps'];
              $update->foto_hotel = $fileName;
              $update->update();

              flash()->success('Succsess', 'Wow Good Job, Succsess Update Data !');
              return redirect()->to('/showHotel');

        }
    }

  public function create()
    {
      return view('admin/addHotel');
    }

  public function store(Request $request)
    {

        $this->validate($request, [
            'nama_hotel' => 'required|min:5|max:50',
            'alamat' => 'required|min:5|max:50',
            'telefon' => 'required|digits_between:5,20|numeric',
            'harga' => 'required|min:3|max:10',
            'fasilitas' => 'required|min:5',
            'maps' => 'required|min:5',
            'foto_hotel' => 'required',
        ]);

         $tambah = new Hotel();
         $tambah->id = Uuid::generate(4);
         $tambah->nama_hotel = $request->nama_hotel;
         $tambah->alamat = $request->alamat;
         $tambah->telefon = $request->telefon;
         $tambah->harga = $request->harga;
         $tambah->fasilitas = $request->fasilitas;
         $tambah->maps = $request->maps;

         $gambar  = $request->file('foto_hotel');
         $fileGambar  = date('Y-m-d-H:i:s')."-".$gambar->getClientOriginalName(); // modified filename for anticipation same file name
         $request->file('foto_hotel')->move("image/", $fileGambar);
         $tambah->foto_hotel = $fileGambar;
         $tambah->save();
         //dd($tambah);

         flash()->success('Succsess', 'Wow Good Job, Succsess Submit Data !');
         return redirect('/showHotel');
    }

  public function destroy($id)
    {
        $hapus = Hotel::find($id);
        $fotoGambar= $hapus->foto_hotel;
        unlink(public_path('image/'.$fotoGambar));
        $hapus->delete();

        flash()->overlay('Succsess', 'Wow Good Job, Succsess Deleted Data !');
        return redirect('/showHotel');
    }
}
