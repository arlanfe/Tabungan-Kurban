<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DetailHewan;
use App\Nasabah;
use App\Hewan;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $nasabah   = DB::select("SELECT hewans.hewan,
                                COUNT(hewans.hewan) AS jumlah 
                                FROM detail_hewans
                                INNER JOIN nasabahs ON 
                                nasabahs.id_detail_hewan = detail_hewans.id
                                INNER JOIN hewans ON 
                                hewans.id = detail_hewans.id_hewan GROUP BY hewans.hewan"
                                );
        // dd($nasabah);
        // $hewan      = Hewan::all();
        $categoris  = [];
        $data       = [];

        foreach($nasabah as $isi){
            $categoris[]    = $isi->hewan;
            $data[]         = $isi->jumlah;
        }
        // dd($data);
        // dd(json_encode($categoris));
        return view('home',compact('categoris','data','nasabah'));
    }
}
