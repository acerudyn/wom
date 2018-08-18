<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class dashboardController extends Controller
{
  public function __construct()     // make akses this must login first
    {
        $this->middleware('auth');
    }

  public function index()
    {
        $users    = DB::table('users')->count();
        $ro       = DB::table('ro')->count();
        $mso      = DB::table('mso')->count();
        $partner  = DB::table('partner')->count();
        $spk      = DB::table('spk')->count();

        return view('admin/dashboard', compact('users','ro','mso','partner',
        'spk'));

    }
}
