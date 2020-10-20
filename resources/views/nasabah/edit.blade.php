@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data Nasabah</div>
                <div class="panel-body">
                <form action="{{ route('nasabah.update', $Nasabah) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{ $Nasabah->nama }}">
                </div>
                <div class="form-group">
                    <label for="">No Telepon</label>
                    <input type="number" class="form-control" name="no_tlp" placeholder="08xxx" value="{{ $Nasabah->no_tlp }}">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat lengkap" value="{{ $Nasabah->alamat }}">
                </div>
                <div class="form-group">
                    <label for="">Kode Hewan</label>
                    <a href="{{ route('hewan.index') }}" class=" btn btn-sm" target="_blank">Cek Kode</a>
                    <select name="id_detail_hewan" id="" class="form-control">
                        @foreach ($DetailHewan as $list)
                            <option value=" {{ $list->id }} "
                            @if ($list->id === $Nasabah->id_detail_hewan)
                                selected
                            @endif
                        >
                                DTHW-{{ $list->id }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


