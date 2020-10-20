@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Data Detail Tabungan</h3></div>
            <div class="panel-body">
            <a href="/tabungan/detail/{{$idN}}/cetak_pdf" target="blank" class=" btn btn-sm btn-primary">Cetak Data</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Nasabah</th>
                    <th>Nama</th>
                    <th>Hewan</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Tabungan</th>
                    <th>Tanggal</th>
                    {{-- @if (Auth:: user()->status=='super_admin')
                    <th>Aksi</th>
                    @endif --}}
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($detail as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>NSBH-{{ $datas->id_nasabah }}</td>
                        <td>{{ $datas->nama }}</td>
                        <td>{{ $datas->hewan }}</td>
                        <td>{{ $datas->berat }}</td>
                        <td>{{ $datas->harga }}</td>
                        <td>{{ $datas->nominal }}</td>
                        <td>{{ $datas->created_at }}</td>
                        {{-- @if (Auth:: user()->status=='super_admin')
                        <td>
                            <a href="{{ Route('tabungan.update', $datas->id_nasabah) }}" class=" btn btn-sm btn-primary" >Edit</a>
                        </td>
                        @endif --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ Route('tabungan.index') }}" class=" btn btn-sm btn-primary">Kembali</a> 
            </div>
        </div>  
        </div>
    </div>
</div>
@endsection