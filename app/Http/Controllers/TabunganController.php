<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailHewan;
use App\Nasabah;
use App\Hewan;
use App\Tabungan;
use Illuminate\Support\Facades\DB;
use PDF;


class TabunganController extends Controller
{
    public function index()
    {
        // $Tabungan = DB::table('tabungans')
        //             ->join('nasabahs', 'nasabahs.id' ,'=', 'tabungans.id_nasabah')
        //             ->join('detail_hewans', 'detail_hewans.id', '=', 'nasabahs.id_detail_hewan')
        //             ->join('hewans', 'hewans.id', '=', 'detail_hewans.id_hewan')
        //             ->select('tabungans.id_nasabah',
        //                     'tabungans.id',
        //                     'tabungans.nominal',
        //                     'nasabahs.nama', 
        //                     'hewans.hewan', 
        //                     'detail_hewans.jenis',
        //                     'detail_hewans.berat', 
        //                     'detail_hewans.harga')
        //             ->where('tabungans.id','IN', 
        //             \DB::raw("(SELECT MAX(id) FROM tabungans GROUP BY id_nasabah)"))->get();
        //             // ->paginate(10);

        $Tabungan = \DB::select( \DB::raw("SELECT tabungans.id_nasabah,
        tabungans.id,
        tabungans.nominal,
        nasabahs.nama, 
        hewans.hewan, 
        detail_hewans.jenis,
        detail_hewans.berat, 
        detail_hewans.harga        
        FROM tabungans INNER JOIN nasabahs ON nasabahs.id=tabungans.id_nasabah
        INNER JOIN detail_hewans ON detail_hewans.id=nasabahs.id_detail_hewan
        INNER JOIN hewans ON hewans.id=detail_hewans.id_hewan
        WHERE tabungans.id IN (SELECT MAX(id) FROM tabungans GROUP BY id_nasabah)") );
        
        return view('tabungan.index', compact('Tabungan'));
    }

    public function create()
    {
        $Nasabah         = Nasabah::all();
        $Hewan           = Hewan::pluck('hewan');
        $DetailHewan     = DetailHewan::pluck('jenis', 'berat', 'harga');
        
        return view('tabungan.create', compact('Nasabah','Hewan','DetailHewan'));
    }

    public function store()
    {   

        Tabungan::create([
                'id_nasabah'  => request('nama'),
                'nominal'     => request('jumlah')
                ]);
        
        return redirect()->route('tabungan.index')->with('success', 'Transaksi berhasil');
    }
    
    public function apiDetailTransaksi($idN)
    {

        // var_dump($idN); die;
        $data = DB::select("SELECT 
                                nasabahs.id,
                                nasabahs.nama,
                                nasabahs.no_tlp,
                                nasabahs.alamat,
                                nasabahs.id_detail_hewan,
                                hewans.hewan,
                                detail_hewans.jenis,
                                detail_hewans.berat,
                                detail_hewans.harga
                                FROM detail_hewans
                                INNER JOIN nasabahs ON nasabahs.id_detail_hewan = detail_hewans.id
                                INNER JOIN hewans ON hewans.id = detail_hewans.id_hewan
                                WHERE nasabahs.id = $idN ");
        
        return response($data);
    }

    public function apiNominalTransaksi($idN)
    {

        // var_dump($idN); die;
        $data = DB::select("SELECT * FROM tabungans 
                            WHERE tabungans.id IN (SELECT MAX(id) 
                            FROM tabungans GROUP BY `id_nasabah`) 
                            AND tabungans.id_nasabah = $idN ");
        
        return response($data);
    }

    public function edit(Tabungan $Tabungan)
    {
        $Nasabah         = Nasabah::all();
        $Hewan           = Hewan::pluck('hewan');
        $DetailHewan     = DetailHewan::pluck('jenis', 'berat', 'harga');
        
        return view('tabungan.edit', compact('Nasabah','Hewan','DetailHewan','Tabungan'));
    }

    public function update(Tabungan $Tabungan)
    {

        $Tabungan->update([
                'id_nasabah'  => request('nm'),
                'nominal'     => request('jumlah')
        ]);

        return redirect()->route('tabungan.index')->with('info', 'Data berhasil diubah');
    }

    public function detail($idN)
    {
        
        $detail = DB::select("SELECT 
                            tabungans.id,
                            tabungans.id_nasabah,
                            tabungans.nominal,
                            tabungans.created_at,
                            nasabahs.nama, 
                            hewans.hewan, 
                            detail_hewans.jenis,
                            detail_hewans.berat, 
                            detail_hewans.harga        
                            FROM tabungans INNER JOIN nasabahs ON nasabahs.id=tabungans.id_nasabah
                            INNER JOIN detail_hewans ON detail_hewans.id=nasabahs.id_detail_hewan
                            INNER JOIN hewans ON hewans.id=detail_hewans.id_hewan
                            WHERE tabungans.id_nasabah =$idN ORDER by tabungans.id DESC");
        
        return view('tabungan.detail', compact('detail','idN'));
    }

    public function cetak_pdf($idN)
    {
    	$detail = DB::select("SELECT 
                            tabungans.id,
                            tabungans.id_nasabah,
                            tabungans.nominal,
                            nasabahs.nama, 
                            hewans.hewan, 
                            detail_hewans.jenis,
                            detail_hewans.berat, 
                            detail_hewans.harga        
                            FROM tabungans INNER JOIN nasabahs ON nasabahs.id=tabungans.id_nasabah
                            INNER JOIN detail_hewans ON detail_hewans.id=nasabahs.id_detail_hewan
                            INNER JOIN hewans ON hewans.id=detail_hewans.id_hewan
                            WHERE tabungans.id_nasabah ='$idN' ORDER by tabungans.id DESC");


    	$pdf = PDF::loadview('tabungan.tabungan_pdf',['detail'=>$detail]);
        return $pdf->stream('laporan-tabungan.pdf');
        
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
            $Tabungan = \DB::select( \DB::raw("SELECT   tabungans.id_nasabah,
                                                        tabungans.id,
                                                        tabungans.nominal,
                                                        nasabahs.nama, 
                                                        hewans.hewan, 
                                                        detail_hewans.jenis,
                                                        detail_hewans.berat, 
                                                        detail_hewans.harga        
                                                        FROM tabungans INNER JOIN nasabahs ON nasabahs.id=tabungans.id_nasabah
                                                        INNER JOIN detail_hewans ON detail_hewans.id=nasabahs.id_detail_hewan
                                                        INNER JOIN hewans ON hewans.id=detail_hewans.id_hewan
                                                        WHERE tabungans.id IN (SELECT MAX(id) FROM tabungans GROUP BY id_nasabah)
                                                        AND nasabahs.nama LIKE '%$cari%'") );
            
            // $Nasabah = DB::table('nasabahs')
            //             ->where('nama','like',"%".$cari."%")
            //             ->paginate();
 
    		// mengirim data pegawai ke view index
		return view('tabungan.index', compact('Tabungan'));
 
    }
}
