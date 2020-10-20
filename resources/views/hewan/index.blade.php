@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading"><h3>Data Hewan</h3></div>
            <div class="panel-body">
            <a href="{{ route('hewan.create') }}" class=" btn btn-sm btn-primary">Tambah Data</a>
            <table class="table table-bordered" id="table_id" class="display">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Hewan</th>
                    <th>Hewan</th>
                    <th>Jenis</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($DetailHewan as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>DTHW-{{ $datas->id }}</td>
                        <td>{{ $datas->hewan }}</td>
                        <td>{{ $datas->jenis }}</td>
                        <td>{{ $datas->berat }} Kg</td>
                        <td>{{ $datas->harga }}</td>
                        <td>
                            <form action="{{ route('hewan.destroy',  $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('hewan.update',  $datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
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

