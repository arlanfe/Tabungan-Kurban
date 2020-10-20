<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DetailHewan;
use App\Nasabah;
use App\Hewan;

class NasabahController extends Controller
{
    public function index()
    {
        // $Nasabah = DB::table('nasabahs')
        //         ->join('detail_hewans', 'nasabahs.id_detail_hewan' ,'=', 'detail_hewans.id')
        //         ->join('hewans', 'hewans.id', '=', 'detail_hewans.id_hewan')
        //         ->select('nasabahs.id','nasabahs.nama', 'nasabahs.no_tlp', 'nasabahs.alamat', 
        //                 'nasabahs.id_detail_hewan','hewans.hewan', 'detail_hewans.jenis', 'detail_hewans.harga')
        //         ->paginate(10);

        $Nasabah = DB::select(" SELECT nasabahs.id,
                                nasabahs.nama,
                                nasabahs.no_tlp,
                                nasabahs.alamat,
                                nasabahs.id_detail_hewan,
                                hewans.hewan,
                                detail_hewans.jenis,
                                detail_hewans.harga
                                FROM detail_hewans
                                INNER JOIN nasabahs ON nasabahs.id_detail_hewan = detail_hewans.id
                                INNER JOIN hewans ON hewans.id = detail_hewans.id_hewan");
        
        return view('nasabah.index', compact('Nasabah'));
    }

    public function create()
    {
        $DetailHewan = DB::select("SELECT 
                                detail_hewans.id,  
                                hewans.hewan, 
                                detail_hewans.jenis, 
                                detail_hewans.berat, 
                                detail_hewans.harga
                                FROM detail_hewans INNER JOIN 
                                hewans ON detail_hewans.id_hewan=hewans.id");

        return view('nasabah.create', compact('DetailHewan'));
    }

    public function store()
    {
        Nasabah::create([
                 'id_detail_hewan'  => request('id_detail_hewan'),
                 'nama'             => request('nama'),
                 'no_tlp'           => request('no_tlp'),
                 'alamat'           => request('alamat')
        ]);
        
        return redirect()->route('nasabah.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Nasabah $Nasabah)
    {
        $DetailHewan = DetailHewan::all();

        return view('nasabah.edit', compact('Nasabah', 'DetailHewan'));
    }

    public function update(Nasabah $Nasabah)
    {

        $Nasabah->update([
                'id_detail_hewan'  => request('id_detail_hewan'),
                'nama'             => request('nama'),
                'no_tlp'           => request('no_tlp'),
                'alamat'           => request('alamat')
        ]);

        return redirect()->route('nasabah.index')->with('info', 'Data berhasil diubah');
    }

    public function destroy(Nasabah $Nasabah)
    {
        $Nasabah->delete();

        return redirect()->route('nasabah.index')->withdanger('Data berhasil dihapus');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        
        // mengambil data dari table pegawai sesuai pencarian data
        $Nasabah = DB::table('nasabahs')
                ->join('detail_hewans', 'nasabahs.id_detail_hewan' ,'=', 'detail_hewans.id')
                ->join('hewans', 'hewans.id', '=', 'detail_hewans.id_hewan')
                ->select('nasabahs.id','nasabahs.nama', 'nasabahs.no_tlp', 'nasabahs.alamat', 
                        'nasabahs.id_detail_hewan','hewans.hewan', 'detail_hewans.jenis', 'detail_hewans.harga')
                ->where('nasabahs.nama','like',"%".$cari."%")
                ->paginate();

    	// mengirim data pegawai ke view index
		return view('nasabah.index', compact('Nasabah'));
 
    }
    
}
