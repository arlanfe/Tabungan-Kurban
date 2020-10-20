<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailHewan;
use App\Hewan;

class DetailhewanController extends Controller
{
    public function index()
    {
        $DetailHewan = \DB::select( \DB::raw("SELECT detail_hewans.id,  hewans.hewan, 
        detail_hewans.jenis, detail_hewans.berat, detail_hewans.harga
        FROM detail_hewans INNER JOIN hewans ON detail_hewans.id_hewan=hewans.id") );
        
        return view('hewan.index', compact('DetailHewan'));
 
    }

    public function create()
    {
        $hewan = Hewan::all();
        return view('hewan.create', compact('hewan'));
    }

    public function store()
    {   
        
        DetailHewan::create([
            'id_hewan'  => request('id_hewan'),
            'jenis'     => request('jenis'),
            'berat'     => request('berat'),
            'harga'     => request('harga')
        ]);
        return redirect()->route('hewan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(DetailHewan $DetailHewan)
    {
        $hewan = Hewan::all();

        return view('hewan.edit', compact('DetailHewan', 'hewan'));
    }

    public function update(DetailHewan $DetailHewan)
    {

        $DetailHewan->update([
            'id_hewan'  => request('id_hewan'),
            'jenis'     => request('jenis'),
            'berat'     => request('berat'),
            'harga'     => request('harga')
        ]);

        return redirect()->route('hewan.index')->with('info', 'Data berhasil diubah');
    }

    public function destroy(DetailHewan $DetailHewan)
    {
        $DetailHewan->delete();

        return redirect()->route('hewan.index')->withdanger('Data berhasil dihapus');
    }

}
