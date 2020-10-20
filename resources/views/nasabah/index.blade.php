@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Data Nasabah</h3></div>
            <div class="panel-body">
            <a href="{{ route('nasabah.create') }}" class=" btn btn-sm btn-primary">Tambah Data</a>
            {{-- <form action="{{ route('nasabah.cari') }}" method="GET">
                <input type="text" name="cari" placeholder="Cari Nasabah .." value="{{ old('cari') }}">
                <input type="submit" value="CARI">
            </form> --}}
            <table class="table table-bordered" id="table_id" class="display">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Kode Hewan</th>
                    <th>Hewan</th>
                    <th>Jenis Hewan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($Nasabah as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->nama }}</td>
                        <td>{{ $datas->no_tlp }}</td>
                        <td>{{ $datas->alamat }}</td>
                        <td>DTHW-{{ $datas->id_detail_hewan }}</td>
                        <td>{{ $datas->hewan }}</td>
                        <td>{{ $datas->jenis }}</td>
                        <td>{{ $datas->harga }}</td>
                        <td>
                            <form action="{{ route('nasabah.delete',  $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('nasabah.update',  $datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
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