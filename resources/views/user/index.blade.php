@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading"><h3>Data Pengguna</h3></div>
            <div class="panel-body">
            <a href="{{ route('user.create') }}" class=" btn btn-sm btn-primary">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($user as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->name }}</td>
                        <td>{{ $datas->email }}</td>
                        <td>{{ $datas->status }}</td>
                        <td>
                            <form action="{{ route('user.delete',  $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('user.update',  $datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
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
</div>
@endsection