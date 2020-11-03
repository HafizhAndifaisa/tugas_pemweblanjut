<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userid= Auth::user()->id;
        $nameofuser = DB::table('mahasiswa')->select('nama')->where('users_id', '=', $userid)->get();
        // var_dump($userid);
        var_dump($nameofuser);
        return view('home', ['nameofuser' => $nameofuser]);
    }
}
