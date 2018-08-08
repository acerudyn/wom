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


}
