<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function indexN()
    {
        return view('laporan.nasabah');
    }

    public function indexT()
    {
        return view('laporan.tabungan');
    }

    public function laporan_nasabah_pdf()
    {
    $tglawal =request('tglawalN');
    $tglakhir =request('tglakhirN');

    // var_dump($tglawal);
    // var_dump($tglakhir); die;
    
    $nasabah = DB::select("SELECT   nasabahs.id,
                                    nasabahs.nama,
                                    nasabahs.no_tlp,
                                    nasabahs.alamat,
                                    nasabahs.id_detail_hewan,
                                    nasabahs.created_at,
                                    hewans.hewan,
                                    detail_hewans.jenis,
                                    detail_hewans.harga
                                    FROM detail_hewans
                                    INNER JOIN nasabahs ON nasabahs.id_detail_hewan = detail_hewans.id
                                    INNER JOIN hewans ON hewans.id = detail_hewans.id_hewan 
                                    WHERE DATE_FORMAT(nasabahs.created_at, '%Y-%m-%d') 
                                    between '$tglawal' AND '$tglakhir'");

    $pdf = PDF::loadView('laporan.laporan_nasabah_pdf', compact('nasabah'));
    return $pdf->stream('laporan-nasabah.pdf');
        
    }

    public function laporan_tabungan_pdf()
    {
    $tglawal =request('tglawalT');
    $tglakhir =request('tglakhirT');

    // var_dump($tglawal);
    // var_dump($tglakhir); die;
    
    $tabungan = DB::select("SELECT  tabungans.id_nasabah,
                                    tabungans.id,
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
                                    WHERE DATE_FORMAT(tabungans.created_at, '%Y-%m-%d') 
                                    between '$tglawal' AND '$tglakhir'");

    $pdf = PDF::loadView('laporan.laporan_tabungan_pdf', compact('tabungan'));
    return $pdf->stream('laporan-tabungan.pdf');
        
    }
}
