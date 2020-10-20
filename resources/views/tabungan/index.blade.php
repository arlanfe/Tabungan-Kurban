@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Data Tabungan</h3></div>
            <div class="panel-body">
            <a href="{{ Route('tabungan.create') }}" class=" btn btn-sm btn-primary">Tambah Data</a>
            {{-- <form action="{{ route('tabungan.cari') }}" method="GET">
                <input type="text" name="cari" placeholder="Cari Nasabah .." value="{{ old('cari') }}">
                <input type="submit" value="CARI">
            </form> --}}
            <table class="table table-bordered" id="table_id" class="display">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Nasabah</th>
                    <th>Nama</th>
                    <th>Hewan</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Tabungan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($Tabungan as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>NSBH-{{ $datas->id_nasabah }}</td>
                        <td>{{ $datas->nama }}</td>
                        <td>{{ $datas->hewan }}</td>
                        <td>{{ $datas->berat }}</td>
                        <td>{{ $datas->harga }}</td>
                        <td>{{ $datas->nominal }}</td>
                        <td>
                            @if (Auth:: user()->status=='super_admin')    
                            <a href="{{ Route('tabungan.detail', $datas->id_nasabah) }}" class=" btn btn-sm btn-primary">Detail</a>
                            <a href="{{ Route('tabungan.update', $datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                            @else
                            <a href="{{ Route('tabungan.detail', $datas->id_nasabah) }}" class=" btn btn-sm btn-primary" >Detail</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>  
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection