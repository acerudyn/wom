<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
  public function index()
    {
        $users = DB::table('users')->get();
        //return view('admin/dashboard')->with('userCount', $users);

        $about = DB::table('about')->get();
        //return view('admin/dashboard')->with('aboutCount', $about);

        $culinarry = DB::table('culinarry')->get();
        //return view('admin/dashboard')->with('culinarryCount', $culinarry);

        $destination = DB::table('destination')->get();
        //return view('admin/dashboard')->with('destinationCount', $destination);

        $gallery = DB::table('gallery')->get();
        //return view('admin/dashboard')->with('galleryCount', $gallery);

        $hotel = DB::table('hotel')->get();
        //return view('admin/dashboard')->with('hotelCount', $hotel);

        return view('user/index', compact('users', 'about', 'culinarry',
         'destination', 'gallery', 'hotel'));

    }
}
