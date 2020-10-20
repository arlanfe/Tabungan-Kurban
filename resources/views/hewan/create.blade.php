@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data Hewan</div>
                <div class="panel-body">
            <form action="{{ route('hewan.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Hewan</label>
                    <select name="id_hewan" id="" class="form-control">
                        @foreach ($hewan as $list)
                            <option value=" {{ $list->id }}">
                                {{ $list->hewan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jenis</label>
                    <input type="text" class="form-control" name="jenis" placeholder="jenis hewan">
                </div>
                <div class="form-group">
                    <label for="">Berat</label>
                    <input type="number" class="form-control" name="berat" placeholder="berat/KG">
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="harga">
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


