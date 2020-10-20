@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data Nasabah</div>

                <div class="panel-body">
            <form action="{{ route('nasabah.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="">No Telepon</label>
                    <input type="number" class="form-control" name="no_tlp" placeholder="08xxx">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat lengkap">
                </div>
                <div class="form-group">
                    <label for="">Hewan | Kode Hewan</label>
                    <a href="{{ route('hewan.index') }}" class=" btn btn-sm" target="_blank">Detail Kode</a>
                    <select name="id_detail_hewan" id="" class="form-control js-example-basic-single">
                        @foreach ($DetailHewan as $list)
                            <option value=" {{ $list->id }} ">
                                {{ $list->hewan }} | DTHW-{{ $list->id }}
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
<script>
    //select2
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection


